<?php

namespace App\Http\Controllers\AccountProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\Ciudad;
use App\Models\LegalPerson;
use App\Models\Pais;
use App\Models\PhysicalPerson;
use App\Models\UserCard;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
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

        $persona = Auth::user()->getPersonaLigada();
        $cuentaBancaria = Auth::user()->getCuentaBancaria();
        $mediosDePago = Auth::user()->getMediosPago();
        $paises = Pais::where('Activo', 1)->get();
        $ciudades = Ciudad::where('Activo', 1)->where('IdPais', $persona->IdPais)->get();
        $bancos = Bank::where('Activo', 1)->where('MedioPagoR', 1)->get();
        
        return view('User.profile', compact('persona', 'cuentaBancaria', 'mediosDePago', 'paises', 'ciudades', 'bancos'));
        
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

             $pais = Pais::getPais($datos['pais']);

             $persona->Telefono = $pais->Prefijo . '-' . $datos['tel'];
             if ($datos['tel2'] != ""){
                $persona->Telefono2 = $pais->Prefijo . '-' . $datos['tel2'];
             }
             

           
             $persona->save();

            
            //  $ciudad = Ciudad::getCiudad($datos['ciudad']);
        }

               
    }

    protected function cambiarFotoPerfil(Request $request)
    {
        if ($request->hasFile('avatar')){
            if ($this->validarImagen($request->all())){
         
                $usuario = Auth::user(); 
                $archivo = $request->file('avatar');
                $extencion = str_after($archivo->getClientOriginalName(), '.' );
                $nombreAvatar = 'av-' . str_before($usuario->Email, '@' ) . $usuario->IdUsuarioR . $usuario->TipoUsuario . "." . $extencion ;
                $archivo->move(public_path() . '/img/images/avatar/', $nombreAvatar);

                $usuario->RutaImagen = 'img/images/avatar/' . $nombreAvatar;
                $usuario->save();               
            }
        }

        return redirect('yosi');
    }

    protected function agregarCuentaBancaria(Request $request)
    {
        $datos = $request->all();
        $usuario = Auth::user();
        if($this->validarDatosBancarios($datos)){
                $cuentaCargada = $this->cargarCuentaBancaria($usuario->IdUsuarioR, $datos);
                $cuentasBancarias = BankAccount::where('IdUsuario', $usuario->IdUsuarioR)->orderBy('IdCuentaBancaria')->get();
                BankAccount::cargarNombresBancos($cuentasBancarias);               
                return response()->json($cuentasBancarias, 200);
            }
            // else{
            //     return response()->json('',500);
            // }
        
    }
    

    protected function borrarCuentaBancaria(Request $request)
    {
        BankAccount::destroy($request->input('idCuentaBancaria'));
        $cuentasBancarias = BankAccount::where('IdUsuario', Auth::user()->IdUsuarioR)->orderBy('IdCuentaBancaria')->get();
        BankAccount::cargarNombresBancos($cuentasBancarias);  
        return response()->json($cuentasBancarias, 200);

    }

    protected function agregarMetodoPago(Request $request)
    {
        $datos = $request->all();
        $usuarioId = Auth::user()->IdUsuarioR;
        if($this->validarDatosTarjetasCreditos($datos)){
            $this->cargarMetodoDePago($usuarioId, $datos);
            $tarjetas = UserCard::where('IdUsuario', $usuarioId)->orderBy('IdTarjeta')->get();
            UserCard::cargarNumeroTarjetas($tarjetas);
        }

        return response()->json($tarjetas,200);
    }

    // protected function modificarFormaPago()
    // {

    // }

    protected function borrarFormaPago(Request $request)
    {
        UserCard::destroy($request->input('IdTarjeta'));
        $tarjetas = UserCard::where('IdUsuario', Auth::user()->IdUsuarioR)->orderBy('IdTarjeta')->get();
        UserCard::cargarNumeroTarjetas($tarjetas);

        return response()->json($tarjetas,200);
    }

    protected function contactoPorDatosSensibles(){
        return view('User.changeProfileInfo');
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
            'numPuerta' => ['required', 'integer'],
            'tel' => ['required', 'integer']
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
            'banco' => ['required','exists:bancosr,IdBanco'],
            'tipoCuenta' => ['required'],
            'NumeroCuenta' => ['required','unique:cuentasbancariasusuariosr'],          
        ])->validate();
    }

    protected function validarDatosTarjetasCreditos(array $datos)
    {
        return Validator::make($datos, [
            'titular' => ['required'],
            'numeroTarjeta' => ['required'],
            'fechaVencimiento' => ['required|date|after:today'],
        ])->validate();
    }

    protected function validarImagen(array $datos){
        return Validator::make($datos,[
            'avatar' => ['mimes:jpg,png,bmp,jpeg,PNG','dimensions:max_width=1500,max_height=1500']
        ])->validate();
    }

    private function cargarMetodoDePago(int $idUsuario, array $datos)
    {
        $numeroTarjeta = str_replace(' ', '', $datos['numeroTarjeta']);
        return UserCard::create([
            'IdUsuario' => $idUsuario,
            'NombreTitular' => $datos['titular'],
            'NumeroTarjeta' => Crypt::encrypt($numeroTarjeta),
            'Vencimiento' => $datos['fechaVencimiento'],
            'Entidad' => UserCard::determinarEntidad($datos['numeroTarjeta'])
        ]);
    }

    private function cargarCuentaBancaria(int $idUsuario, array $datos)
    {
        try {
            $cuenta = BankAccount::create([
                'IdUsuario' => $idUsuario,
                'IdBanco' => $datos['banco'],
                'TipoCuenta' => $datos['tipoCuenta'],
                'NumeroCuenta' => $datos['NumeroCuenta'],
            ]);

            return $cuenta;
        } catch (\Throwable $th) {
            return $th;
        }
       
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
