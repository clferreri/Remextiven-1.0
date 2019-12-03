<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function Autenticar(Request $request){
        $email = $request->email;
        $contrasena = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $contrasena, 'activo' => 1])){
            return view('Home.inicio');
        }
        else{
            $usuario = User::where('Email', $email)->first();

            if ($usuario != null){
                if ($usuario->Activo == 1){
                    return Redirect::back()->withErrors(['Las credenciales son incorrectas.']);
                }
                else{
                    return Redirect::back()->withErrors(['La cuenta no se encuentra activa. <a href="forwardActivationEmail/' . $email .'">Reenviar e-mail de activacion</a>']);
                }
            }

                   
            else {
               return Redirect::back()->withErrors(['<p style="margin-top: 15px;">Las credenciales son incorrectas.</p>']);
            }
        }
        
    }

}
