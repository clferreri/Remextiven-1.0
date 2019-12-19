<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transfer;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    

    protected function createTransfer(Request $request){
        $datos = $request->all();
        if ($this->ValidarTransferencia($datos) && $this->ValidarCotizacionTransferencia($datos)){

        }
    }

    private function CargarCotizacionTransferencia(){

    }


    private function ValidarTransferencia($datos){
        return Validator::make($datos, [
            'idUsuario' => ['required', 'exists:UsuariosR,IdUsuarioR'],
            'idTipoTransferencia' => ['required', 'exists:TipossolicitudTransferencia,IdTipo'],
            'idCuentaBeneficiaria' => ['required', 'exists:CuentasBeneficiarios,IdCuenta'],
            'idMedioPago' => ['required',],
        ])->validate();
        
    }

    private function ValidarCotizacionTransferencia($datos){
        return Validator::make($datos, [
            'montoEnviar' => ['required', 'exists:UsuariosR,IdUsuarioR'],
            'montoRecibirBanesco' => ['required', 'exists:TipossolicitudTransferencia,IdTipo'],
            'montoRecibirOtro' => ['required'], 
            'idCuentaBeneficiaria' => ['required', 'exists:CuentasBeneficiarios,IdCuenta'],
            'idMoneda' => ['required','numeric','unique:personasfr,Documento'], 
            'cotiVESBanesco' => ['required','numeric'], 
            'cotiVESOtro' => ['required','numeric'], 
            'cotiUSD' => ['required','numeric'], 
        ])->validate();
    }

    private function AltaTransferenciaAdmin($datos){
        return Transfer::create([
            'IdUsuarioSolicita' => $datos[''],
            'IdEstadoTransferencia' => $datos['nombre'],
            'IdTipoTransferencia' => $datos['apellido'],
            'IdMedioPago' => $datos['segundoApellido'],
            'IdCuentaBeneficiaria' => $datos['documento'],
            'FechaSolicitada' => $datos['tipoDocumento']
        ]);
    }

    private function AltaCotizacionAdmin($datos){
        return 
    }
}
