<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BeneficiaryAccount;
use Illuminate\Support\Facades\Validator;

class BeneficiaryAccountController extends Controller
{

    protected function createBeneficiaryAccount(Request $request){
        $datos = $request->all();
        if ($this->validarDatosBeneficiaryAccount($datos)){
            $nuevoBeneficiario = $this->newBeneficiaryAccount($datos);
            return $nuevoBeneficiario->toJson();
        }
        


    }

    //Obtiene las cuentas beneficiarias del usuario indicado
    protected function getBeneficiaryAccount(Request $request){
        $idUsuario = $request->input("idUsuario");
        $cuentasBeneficiarias = BeneficiaryAccount::where('IdUsuario', $idUsuario)->get();
         return $cuentasBeneficiarias->toJson();
     }


     private function newBeneficiaryAccount($datos){
        return BeneficiaryAccount::create([
            'IdUsuario' => $datos['idUsuario'],
            'IdBanco' => $datos['idBanco'],
            'TipoCuenta' =>  $datos['tipoCuenta'],
            'NumeroCuenta' => $datos['numeroCuenta'],
            'NombreTitular' => $datos['nombreTitular'],
            'ApellidoTitular' => $datos['apellidoTitular'],
            'TipoDocumento' => $datos['tipoDocumento'],
            'Documento' => $datos['documento'],
            'Alias' => $datos['alias'],
            // 'Activo' => 1
        ]);

     }

     private function validarDatosBeneficiaryAccount($datos){
        return Validator::make($datos, [
            'idUsuario' => ['required', 'numeric'],
            'idBanco' => ['required', 'numeric'],
            'tipoCuenta' => ['required'], 
            'numeroCuenta' => ['required', 'numeric'],
            'nombreTitular' => ['required'], 
            'apellidoTitular' => ['required'], 
            'tipoDocumento' => ['required'], 
            'documento' => ['required','numeric'], 
            'alias' => ['required',]
        ])->validate();
     }
}
