<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivacionCuenta;

class ActivationUserController extends Controller
{
    protected function ActivarCuenta($token){
        $usuario = User::where('TokenActivacion', $token)->first();

        if ($usuario == null){
            return "No existe";
        }
        else{
            $usuario->Activo = 1;
            $usuario->TokenActivacion = NULL;
            $usuario->save();
            return "Se activo la cuenta";
        }
    }


    protected function reenviarMail($email){
        $usuario = User::where('Email', $email)->first();

        $this->enviarMailConfirmacion($usuario->TokenActivacion, $usuario->Email);

        return view('Register.registerConfirmationForward');
    }

    protected function enviarMailConfirmacion($tokenActivacion, $mailUsu){
        Mail::to($mailUsu)->send(new ActivacionCuenta($tokenActivacion));
    }


}
