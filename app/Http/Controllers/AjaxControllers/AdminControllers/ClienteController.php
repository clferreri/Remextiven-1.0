<?php

namespace App\Http\Controllers\AjaxControllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ActivacionCuenta;
use App\Mail\ConfirmacionCuentaCreadaAdmin;
use App\Models\BeneficiaryAccount;
use App\Models\PhysicalPerson;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    //Genera un cliente y devuelve una respuesta de la creacion del usuario
    protected function createCliente(Request $request){
        $datos = $request->all();
        if ($this->ValidarDatosUsuarioCliente($datos) && $this->ValidarDatosClienteFisico($datos)){
            $contrasena = str::random(10);
            $usuario = $this->CrearUsuarioCliente($datos, $contrasena);
            $this->crearPersonaFisicaCliente($datos, $usuario->IdUsuarioR);

            $nombre = $datos['nombre'] . ' ' . $datos['apellido'] . ' ' . $datos['segundoApellido'];
            Mail::to($usuario->Email)->send(new ConfirmacionCuentaCreadaAdmin($nombre, $usuario->Email, $contrasena));
            return response()->json(['respuesta' => 'Cliente cargado correctamente'], 200);
        }
        else{
            return response()->json(['respuesta' => 'Erro al cargar el cliente. Valide los datos ingresados'], 500);
        }
    }


    private function ValidarDatosUsuarioCliente($datos){
        return Validator::make($datos, [
            'email' => ['required','unique:usuariosr,Email','email:rfc,dns' ],
        ])->validate();
    }

    private function ValidarDatosClienteFisico($datos){
        $fechaMayorEdad = Carbon::today()->subYear(18);
        return Validator::make($datos, [
            'fechaNacimiento' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'], 
            'segundoApellido' => ['required'],
            'documento' => ['required','numeric','unique:personasfr,Documento'], 
            'paisDocumento' => ['required','numeric'], 
            'pais' => ['required','numeric'], 
            'ciudad' => ['required','numeric'], 
            'dir' => ['required',],
            'numeroPuerta' => ['required'], 
            'telefono' => ['required','numeric'], 
        ])->validate();
        
    }

    private function CrearUsuarioCliente($datos, $contra){
        return User::create([
            'TipoUsuario' => 1,
            'Email' => $datos['email'],
            'Password' =>  Hash::make($contra),
            'FechaRegistro' => Carbon::today(),
            'IdRol' => 1,
            'Activo' => 1,
            'Verificado' => 0,
            'TokenActivacion' => Str::random(40),
            'NewsLetters' => 1,
            'TokenReferido' => substr($datos['email'],0,4) . str::random(6),
            'RutaImagen' => 'img/images/avatar.png',
            'EsReferido ' => 0
        ]);
        }

    private function crearPersonaFisicaCliente($data, $idUsuario){
        return PhysicalPerson::create([
            'IdUsuario' => $idUsuario,
            'Nombre' => $data['nombre'],
            'PrimerApellido' => $data['apellido'],
            'SegundoApellido' => $data['segundoApellido'],
            'Documento' => $data['documento'],
            'TipoDocumento' => $data['tipoDocumento'],
            'FechaNacimiento' => $data['fechaNacimiento'],
            'Sexo' => 'Otro',
            'IdPaisDocumento' => $data['paisDocumento'],
            'IdPais' => $data['pais'],
            'IdCiudad' => $data['ciudad'],
            'Direccion' => $data['dir'],
            'NumeroPuerta' => $data['numeroPuerta'],
            'Telefono' => $data['telefono'],
        ]);
    }
    
    }
