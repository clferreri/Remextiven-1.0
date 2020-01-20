<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    protected function createUser(Request $request){
        $datos = $request->all();
        if($this->validarDatosUsuario($datos) && $this->validarDatosPersonal($datos)){
            $usuario = $this->crearUsuario($datos);
            $this->crearPersonaEmpleado($datos, $usuario->IdUsuarioR);
            return response()->json(['respuesta' => 'Usuario generado correctamente'], 200);
        }
        else{
            return response()->json(['respuesta' => 'Error al generar el Usuario. Valide los datos ingresados'], 500);
        }

    }


    private function validarDatosUsuario($datos){
        return Validator::make($datos, [
            'emailUsuario' => ['required','unique:usuariosr,Email','email:rfc,dns' ],
        ])->validate();
    }

    private function validarDatosPersonal($datos){
        return Validator::make($datos, [
            'idRol' => ['required', 'numeric', 'exists:RolesUsuariosR,IdRol'],
            'fechaNacimiento' => ['required'],
            'primerNombre' => ['required'],
            'primerApellido' => ['required'], 
            'documento' => ['required','numeric','unique:personaer,Documento'], 
            'paisDocumento' => ['required','numeric'], 
            'idCargo' => ['required', 'numeric', 'exists:Cargos,IdCargo'],
            'pais' => ['required','numeric'], 
            'ciudad' => ['required','numeric'], 
            'dir' => ['required',],
            'numeroPuerta' => ['required'], 
            'telefono' => ['required','numeric'], 
        ])->validate(); 
    }

    private function crearUsuario($datos){
        return User::create([
            'TipoUsuario' => 3,
            'Email' => $datos['emailUsuario'],
            'Password' =>  Hash::make('WelcomeRemextiven'),
            'FechaRegistro' => Carbon::today(),
            'IdRol' => $datos['idRol'],
            'Activo' => 1,
            'Verificado' => 0,
            'TokenActivacion' => Str::random(40),
            'NewsLetters' => 0,
            'TokenReferido' => substr($datos['emailUsuario'],0,4) . str::random(6),
            'RutaImagen' => 'img/images/avatar.png',
            'EsReferido ' => 0,
            'RequiereCambioPass' => 1
        ]);
        $retVal = (1 == 1) ? 2 : 3 ;
    }

    private function crearPersonaEmpleado($datos, $idUsuario){
        return Employee::create([         
            'IdUsuario' => $idUsuario,
            'PrimerNombre' => $datos['primerNombre'],
            'SegundoNombre' => ($datos['segundoNombre'] != "") ? $datos['segundoNombre'] : null,
            'PrimerApellido' => $datos['primerApellido'],
            'SegundoApellido' => ($datos['segundoApellido'] != "") ? $datos['segundoApellido'] : null,
            'Documento' => $datos['documento'],
            'TipoDocumento' => $datos['tipoDocumento'],
            'FechaNacimiento' => $datos['fechaNacimiento'],
            'Sexo' => 'Otro',
            'IdPaisDocumento' => $datos['paisDocumento'],
            'IdPais' => $datos['pais'],
            'IdCiudad' => $datos['ciudad'],
            'Direccion' => $datos['dir'],
            'NumeroPuerta' => $datos['numeroPuerta'],
            'Telefono' => $datos['telefono'],
            'Telefono2' => $datos['telefono2'],
            'IdCargo' => $datos['idCargo'],
            'CorreoPersonal' => ($datos['emailPersonal'] != "") ? $datos['emailPersonal'] : null,
        ]);
    }
}
