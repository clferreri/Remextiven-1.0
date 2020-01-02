<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BeneficiaryAccount;
use App\Models\Transfer;
use App\Models\TransferQuotation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Traits\TransferenciaPDF;

class TransferController extends Controller
{
    
    public function createTransfer(Request $request){
        $datos = $request->all();
        if ($this->ValidarTransferencia($datos) && $this->ValidarCotizacionTransferencia($datos)){
            $transferencia = $this->AltaTransferenciaAdmin($datos);
            $cotizacionTransferencia = $this->AltaCotizacionAdmin($transferencia, $datos);
            $pdf = TransferenciaPDF::generarPDF($transferencia, $cotizacionTransferencia);  
            TransferenciaPDF::abrirPDF($transferencia->IdSolicitudTransferencia);   
            TransferenciaPDF::enviarPorMail('clferreri94@hotmail.com', 'Cristian Pepito', $pdf, $transferencia->IdSolicitudTransferencia);     
        }
        dd('No funco');
    }

    private function CargarCotizacionTransferencia(){

    }


    private function ValidarTransferencia($datos){
        return Validator::make($datos, [
            'idUsuario' => ['required', 'exists:UsuariosR,IdUsuarioR'],
            'idTipoTransferencia' => ['required', 'exists:TipossolicitudTransferencia,IdTipo'],
            'idBeneficiario' => ['required', 'exists:CuentasBeneficiarios,IdCuenta'],
            'idMedioPago' => ['required', 'exists:MediosDePago,IdMedioPago'],
        ])->validate();
        
    }

    private function ValidarCotizacionTransferencia($datos){
        return Validator::make($datos, [
            'montoEnviar' => ['required', 'numeric'], 
            'idMoneda' => ['required','numeric', 'exists:Monedas,IdMoneda'], 
            'cotiVESBanesco' => ['required','numeric'], 
            'cotiVESOtro' => ['required','numeric'], 
            'cotiUSD' => ['required','numeric'], 

        ])->validate();
    }

    private function AltaTransferenciaAdmin($datos){
        return Transfer::create([
            'IdUsuarioSolicita' => $datos['idUsuario'],
            'IdEstadoTransferencia' => 1,
            'IdTipoTransferencia' => $datos['idTipoTransferencia'],
            'IdMedioPago' => $datos['idMedioPago'],
            'IdCuentaBeneficiaria' => $datos['idBeneficiario'],
            'FechaSolicitada' => Carbon::today()
        ]);
    }

    private function AltaCotizacionAdmin($transferencia, $datos){
        $cuentaBeneficiaria = BeneficiaryAccount::where('IdCuenta', $transferencia->IdCuentaBeneficiaria)->first();
        $cotizacionVES = 0;
        $margenGanancia = 0;
        if ($cuentaBeneficiaria->IdBanco == Bank::where('Banco', 'BANESCO BANCO UNIVERSAL')->first()->IdBanco){
            $cotizacionVES = $datos['cotiVESBanesco'];
            $margenGanancia = str_replace("%", "", $datos['margen']);
        }
        else{
            $cotizacionVES = $datos['cotiVESOtro'];
            $margenGanancia = str_replace("%", "", $datos['margen']) + 2;
        }
        
        $ganancia = $this->CalcularComision($margenGanancia, $cotizacionVES, $datos['montoEnviar']);
        
        return TransferQuotation::create([
            'IdSolicitudTransferencia' => $transferencia->IdSolicitudTransferencia,
            'IdMoneda' => $datos['idMoneda'],
            'MontoEnviar' => $datos['montoEnviar'],
            'Cambio' => $datos['cotiUSD'],
            'CotizacionVES' => $cotizacionVES,
            'MargenGanancia' => $margenGanancia,
            'ComisionEstimada' => $ganancia
        ]);
    }

    private function CalcularComision($margenGanancia, $cotiVES, $montoEnviar){
        $realVES = ($cotiVES * 100) / (100 - $margenGanancia);
        $ganancia = $montoEnviar - (($cotiVES * $montoEnviar) / $realVES);
        return $ganancia;
    }
}
