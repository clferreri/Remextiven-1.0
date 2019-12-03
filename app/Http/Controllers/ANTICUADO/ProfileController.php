<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\LegalPerson;
use App\Models\Pais;
use App\Models\PhysicalPerson;
use App\Models\UserCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class ProfileController extends Controller
{
    

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index()
    {

        return 'ola';
        // $persona = Auth::user()->getPersonaLigada();
        // $cuentaBancaria = Auth::user()->getCuentaBancaria();
        // $mediosDePago = Auth::user()->getMediosPago();
        // $paises = Pais::where('Activo', 1)->get();
        // $ciudades = Ciudad::where('Activo', 1)->where('IdPais', $persona->IdPais)->get();
        
        // return view('User.profile', compact('persona', 'cuentaBancaria', 'mediosDePago', 'paises', 'ciudades'));
        
    }

    protected function cambiarDatosPersonales(Request $request)
    {
        $datos = $request->all();  
        $usuario = Auth::user(); 

        if( $this->validarDatosPersona($datos)){
            if ($usuario->TipoUsuario == "P"){
                $persona = PhysicalPerson::where('IdUsuario', $usuario->IdUsuarioR)->first();    
            }
            elseif ($usuario->TipoUsuario == "E"){
                $persona = LegalPerson::where('IdUsuario', $usuario->IdUsuarioR)->first();
            }

             //Modifico los datos de la persona ()
             $persona->IdPais = $datos['pais'];
             $persona->IdCiudad = $datos['ciudad'];
             $persona->Direccion = $datos['dir'];
             $persona->NumeroPuerta = $datos['numPuerta'];
             $persona->CodigoPostal = $datos['codigoPostal'];
             $persona->Telefono = $datos['tel'];
             $persona->Telefono2 = $datos['tel2'];

             if ($request->hasFile('avatar')){


                $archivo = $request->file('avatar');
                $archivo->store('public');
                // $extencion = str_after($archivo->getClientOriginalName(), '.' );
                // $nombreAvatar = 'av-' . str_before($usuario->Email, '@' ) . $usuario->IdUsuarioR . $usuario->TipoUsuario . "." . $extencion ;
                // $archivo->move(public_path() . '/img/images/avatar/', $nombreAvatar);
    
                // $usuario->RutaImagen = 'img/images/avatar/' . $nombreAvatar;
                
            }
             $usuario->save();
             $persona->save();

            //  $pais = Pais::getPais($datos['ciudad']);
            //  $ciudad = Ciudad::getCiudad($datos['ciudad']);
        }
        else{
            
                                             
        }

               
    }

    protected function cambiarDatosBancarios(Request $request)
    {
        $datos = $request->all();
        if($this->validarDatosBancarios($datos)){
            $cuentaBancaria = Auth::user()->getCuentaBancaria();
            if($cuentaBancaria == null){
                
            }
            else{
                $cuentaBancaria->Banco = $datos['banco'];
                $cuentaBancaria->TipoCuenta = $datos['tpCuenta'];
                $cuentaBancaria->NumeroCuenta = $datos['numCuenta'];

                $cuentaBancaria->Save();
            }
        }
    }

    protected function agregarMetodoPago(Request $request)
    {
        $datos = $request->all();
        if($this->validarDatosTarjetasCreditos($datos)){
           return $this->cargarMetodoDePago(Auth::user()->IdUsuarioR, $datos);
        }
    }

    // protected function modificarFormaPago()
    // {

    // }

    protected function borrarFormaPago()
    {

    }

    protected function validarDatosPersona(array $datos)
    { 
        return Validator::make($datos, [
            // 'nomb' => ['required', 'string', 'min:3', 'max:20'],
            // 'ape' => ['required', 'string', 'min:3', 'max:20'],
            // 'ape2' => ['required', 'string', 'min:3', 'max:20'],
            'pais' => ['required', 'integer','exists:paises,IdPais'],
            'ciudad' => ['required', 'integer', 'exists:ciudades,IdCiudad'],
            'dir' => ['required'],
            'numPuerta' => ['required'],
            'tel' => ['required'],
            'avatar' =>['size:1000']
        ])->validate();
    }

    protected function validarDatosEmpresa(array $datos)
    {
        return Validator::make($datos, [
            'dir' => ['required', 'min:3'],
            'codigoPostal' => [''],
            'numPuerta' => ['required', 'min:2'],
            'tef' => ['required', 'min:8'],
            'tef2' => []        
        ])->validate();
    }

    protected function validarDatosBancarios(array $datos)
    {
        return Validator::make($datos, [
            'banco' => ['required','exists:bancos,IdBanco'],
            'tpCuenta' => ['required'],
            'numCuenta' => ['required', 'min:10'],          
        ])->validate();
    }

    protected function validarDatosTarjetasCreditos(array $datos)
    {
        return Validator::make($datos, [
            ''
        ])->validate();
    }

    private function cargarMetodoDePago(int $idUsuario, array $datos)
    {
        return UserCard::created([
            'IdUsuario' => $idUsuario,
            'NombreTitular' => $datos['nomTitular'],
            'NumeroTarjeta' => $datos['numTarjeta'],
            'Vencimiento' => $datos['vto'],
            'CodigoSeguridad' => $datos['codSeguridad'],
        ]);
    }


    protected function actualizarImagen(Request $request)
    {
        $usuario = Auth::user();
        if ($request->hasFile('avatar')){

            $archivo = $request->file('avatar');
            $nombreAvatar = 'av-' . str_after('@', $usuario->Email) . $usuario->IdUsuarioR . $usuario->TipoUsuario;
            $archivo->move(public_path() . '/img/images/avatar/', $nombreAvatar);

            $usuario->RutaImagen = 'img/images/avatar/' . $nombreAvatar;
            
        }
    }




}
