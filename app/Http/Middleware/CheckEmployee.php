<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usuario = Auth::user();
        if($usuario != null){
            if($usuario->Rol->SoloEmpleado == 1){
                return $next($request);
            }
            else{
                return redirect('home');
            }
        }
        else{
            return redirect('login');
        }
       
    }
}
