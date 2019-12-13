<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransferController extends Controller
{
    

    private function CargarTransferencia(){

    }

    private function CargarCotizacionTransferencia(){

    }


    private function ValidarTransferencia($datos){
        return Validator::make($datos, [
            'idUsuario' => ['required', 'exists:UsuariosR,IdUsuarioR'],
            'idTipoTransferencia' => ['required', 'exists:TipossolicitudTransferencia,IdTipo'],
            'idMedioPago' => ['required'], 
            'idCuentaBeneficiaria' => ['required'],
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
