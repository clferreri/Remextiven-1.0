<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    

    private function createTransfer(Request $request){
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
            'idMedioPago' => ['required'], 
            'idCuentaBeneficiaria' => ['required', 'exists:CuentasBeneficiarios,IdCuenta'],
            'idMoneda' => ['required','numeric','unique:personasfr,Documento'], 
            'IdMoneda' => ['required','numeric'], 
            'MontoEnviar' => ['required','numeric'], 
            'Cambio' => ['required','numeric'], 
            'CotizacionVES' => ['required',],
            'ComisionGanancia' => ['required'], 
            'ComisionEstimada' => ['required','numeric'], 
        ])->validate();
        
    }

    private function ValidarCotizacionTransferencia($datos){
        return Validator::make($datos, [
            'idUsuario' => ['required', 'exists:UsuariosR,IdUsuarioR'],
            'idTipoTransferencia' => ['required', 'exists:TipossolicitudTransferencia,IdTipo'],
            'idMedioPago' => ['required'], 
            'idCuentaBeneficiaria' => ['required', 'exists:CuentasBeneficiarios,IdCuenta'],
            'idMoneda' => ['required','numeric','unique:personasfr,Documento'], 
            'IdMoneda' => ['required','numeric'], 
            'MontoEnviar' => ['required','numeric'], 
            'Cambio' => ['required','numeric'], 
            'CotizacionVES' => ['required',],
            'ComisionGanancia' => ['required'], 
            'ComisionEstimada' => ['required','numeric'], 
        ])->validate();
    }
}
