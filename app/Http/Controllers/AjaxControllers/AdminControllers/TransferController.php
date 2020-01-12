<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BeneficiaryAccount;
use App\Models\PercentGain;
use App\Models\RateConfig;
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
            TransferenciaPDF::enviarPorMail('clferreri94@hotmail.com', 'Cristian Pepito', $transferencia->IdSolicitudTransferencia);     
            return response('OK', 200);
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
        $tasa = RateConfig::where('Fecha', Carbon::today()->toDateString())
        ->orderBy('created_at', 'desc')->first();
        $montoRecibir = null;
        $cambio = null; $cotizacionVES = null; $comision = null;
        $margen = PercentGain::where('Actual', 1)->first();
        if ($tasa != null){
            $cambio = $tasa->USDUYU;

            if ($cuentaBeneficiaria->IdBanco == Bank::where('Banco', 'BANESCO BANCO UNIVERSAL')->first()->IdBanco){
                //Si la moneda es pesos (1 es pesos)
                if ($datos['idMoneda'] == 1){
                    $cotizacionVES = $tasa->TasaBanescoUYU;                 
                }
                else{
                    $cotizacionVES = $tasa->TasaBanescoUSD;
                }
            }
            else{
                if ($datos['idMoneda'] == 1){
                    $cotizacionVES = $tasa->TasaOtroUYU;                 
                }
                else{
                    $cotizacionVES = $tasa->TasaOtroUSD;
                }
            }
            $montoRecibir = round($cotizacionVES * $datos['montoEnviar'], 2);
            $comision = $this->CalcularComision($margen->PorcentajeGanancia, $datos['montoEnviar']);
        }
        
        
        return TransferQuotation::create([
            'IdSolicitudTransferencia' => $transferencia->IdSolicitudTransferencia,
            'IdMoneda' => $datos['idMoneda'],
            'MontoEnviar' => $datos['montoEnviar'],
            'MontoRecibir' => $montoRecibir,           
            'Cambio' => $cambio,
            'CotizacionVES' => $cotizacionVES,
            'MargenGanancia' => trim($margen->TextoGanancia, '%'),
            'ComisionEstimada' => $comision
        ]);
    }

    protected function AbrirPDF(Request $request){
        $id = $request->idTransferencia;

        $pathPDF = storage_path('app\public\Transferencias\Tr. N°') . $id . '.pdf';
        return response()->file($pathPDF);
    }

    private function CalcularComision($margenGanancia, $montoEnviar){
        $ganancia = round($montoEnviar * $margenGanancia,2);
        return $ganancia;
    }


}
