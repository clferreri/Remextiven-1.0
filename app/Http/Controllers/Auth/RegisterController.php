<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Models\PhysicalPerson;
use Illuminate\Support\Carbon;
use App\Models\Pais;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivacionCuenta;
use App\Models\LegalPerson;
use Illuminate\Validation\Rule;
use App\Models\Referred;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function index(){
        return view('Register.register');
    }


    //Carga el formulario correspondiente segun el tipo de cuenta que vayas a crear
    protected function cargarFormulario(Request $request){
        $paises = Pais::where('Activo', 1)->get();
        //$email = ["mail" => $request->input('email')];
        $email = $request->input('email');
        $token = $request->input('tokenReferencia');
        $idUsuRef = 0;
        if ( $token != "0"){
            $idUsuRef = $this->idUsuarioReferido($token);
        }
        if ($request->optTipoCuenta == 0){
           return view('Register.registerPersona', compact('paises', 'email', 'idUsuRef'));
        }
        else{
            return view('Register.registerEmpresa', compact('paises', 'email', 'idUsuRef'));
        }
    }

    protected function cargarFormularioReferido($token){
        return redirect('register')->with('token', $token);

        // return view('Register.register', compact('token'));
    }

    //Crea una usario completo (basicamente crea un usuario normal)
    protected function crearUsuarioCompleto(Request $request){
        $datos = $request->all();
        $seguir = false;
        $mailUsu = "";
        $tokenUsu = "";
        $idUsu ="";
        if ($this->validarUsuario($datos)){          
            if($request->input('tpu') == 'P'){
                if($this->validarPersona($datos)){  
                    $usu = $this->crearUsuario($datos);
                    $idUsu = $usu->IdUsuarioR;
                    $mailUsu = $usu->Email;                                                           
                    $this->crearPersona($datos, $idUsu);
                    $tokenUsu = $usu->TokenActivacion;
                    $seguir= true;
                    
                }
            }
            else{
                if($this->validarEmpresa($datos)){
                    $usu = $this->crearUsuario($datos);
                    $idUsu = $usu->IdUsuarioR;
                    $mailUsu = $usu->Email;
                    $persona = $this->crearEmpresa($datos, $idUsu);
                    $tokenUsu = $usu->TokenActivacion; 
                    $seguir= true;             
                }
            }

            if($seguir){
                if ($datos['idReferencia'] != 0){
                    referenciarUsuario($datos['idReferencia'],$idUsu);
                }
                 $this->enviarMailConfirmacion($tokenUsu, $mailUsu);

                return view('Register.registerConfirmation');
            }
            
            else{
                return 'Algo paso en el camino';
            }
         

        }
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validarUsuario(array $data)
    {
        return Validator::make($data, [
            'tpu' => ['required', 'string', 'max:1'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:usuariosR'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();
    }

    protected function validarPersona(array $data)
    {
        $resultado = Validator::make($data, [
            'nomb' => ['required', 'string', 'min:3', 'max:20'],
            'ape' => ['required', 'string', 'min:3', 'max:20'],
            'ape2' => ['required', 'string', 'min:3', 'max:20'],
            'tipDoc' => ['required', Rule::in(['DNI', 'PASS'])],
            'doc' => ['required', 'min:5', 'integer'],
            'pais' => ['required', 'integer','exists:paises,IdPais'],
            'ciudad' => ['required', 'integer', 'exists:ciudades,IdCiudad'],
            'dir' => ['required', 'min:3'],
            'numPuerta' => ['required', 'min:2'],
            'tef' => ['required', 'min:8']
        ])->validate();

        return $resultado;
    }

    protected function validarEmpresa(array $data)
    {
        return Validator::make($data, [
            'rs' => ['required', 'string', 'max:40'],
            'nombreF' => ['required', 'string', 'max:40'],
            'it' => ['required', 'integer', 'min:6'],
            'fj' => ['required', Rule::in(['UNI', 'S.R.L', 'S.A'])],
            'pais' => ['required', 'integer','exists:paises,IdPais'],
            'ciudad' => ['required', 'integer', 'exists:ciudades,IdCiudad'],
            'dir' => ['required', 'min:3'],
            'numPuerta' => ['required', 'min:2'],
            'tef' => ['required', 'min:8']
         
        ])->validate();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function crearUsuario(array $data)
    {
        $notificar = 0;
        if(isset($data['nl'])){
            $notificar = 1;
        }
        
        return User::create([
            'TipoUsuario' => $data['tpu'],
            'Email' => $data['email'],
            'Password' =>  Hash::make($data['password']),
            'FechaRegistro' => Carbon::today(),
            'IdRol' => 1,
            'Activo' => 0,
            'Verificado' => 0,
            'TokenActivacion' => Str::random(40),
            'NewsLetters' => $notificar,
            'TokenReferido' => substr($data['email'],0,4) . str::random(6),
            'RutaImagen' => 'img/images/avatar.png'
        ]);
    }



    protected function crearPersona(array $data, int $idUsu){
        return PhysicalPerson::create([
            'IdUsuario' => $idUsu,
            'Nombre' => $data['nomb'],
            'PrimerApellido' => $data['ape'],
            'SegundoApellido' => $data['ape2'],
            'Documento' => $data['doc'],
            'TipoDocumento' => $data['tipDoc'],
            'FechaNacimiento' => $data['fechaNacimiento'],
            'Sexo' => $data['optSexo'],
            'IdPais' => $data['pais'],
            'IdCiudad' => $data['ciudad'],
            'Direccion' => $data['dir'],
            'NumeroPuerta' => $data['numPuerta'],
            'Telefono' => $data['codigoTef'] . '-' . $data['tef']
        ]);
    }

    protected function crearEmpresa(array $data, int $idUsu){
        return LegalPerson::create([
            'IdUsuario' => $idUsu,
            'RazonSocial' => $data['rs'],
            'NombreFantasia' => $data['nombreF'],
            'IdTributaria' => $data['it'],
            'FormaJuridica' => $data['fj'],
            'FechaConformacion' => $data['fc'],
            'IdPais' => $data['pais'],
            'IdCiudad' => $data['ciudad'],
            'Direccion' => $data['dir'],
            'NumeroPuerta' => $data['numPuerta'],
            'Telefono' =>$data['codigoTef'] . '-' . $data['tef']
        ]);
    }


    protected function enviarMailConfirmacion($tokenActivacion, $mailUsu){
        Mail::to($mailUsu)->send(new ActivacionCuenta($tokenActivacion));
    }

    protected function idUsuarioReferido($token)
    {
        $usuario = User::where('TokenReferido', $token)->first();
        return $usuario->IdUsuarioR;
    }

    protected function referenciarUsuario($IdUsuarioReferencia, $idUsuarioReferido)
    {
       return Referred::created([
            'IdUsuarioRefiere' => $IdUsuarioReferencia,
            'IdUsuarioReferido' => idUsuarioReferido
        ]);
    }

}
