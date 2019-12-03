<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserCard extends Model
{
    protected $table = 'TarjetasUsuariosR';
    protected $primaryKey = 'IdTarjeta';


    protected $fillable = [
        'IdUsuario', 'NombreTitular', 'NumeroTarjeta', 'Vencimiento', 'Entidad', 'Activo'
    ];

    public function getNumero(){
        try {
            $ultimosdigitos = "";
            $decrypted = Crypt::decrypt($this->NumeroTarjeta);
            $longitudTarjeta = strlen($decrypted);
            for ($i=0; $i <= $longitudTarjeta -3 ; $i++) { 
                $ultimosdigitos .= "*";
            }
            $ultimosdigitos .= substr($decrypted, $longitudTarjeta -4, 3);
            return $ultimosdigitos;
        } catch (DecryptException $e) {
         return "Error al desencriptar";
        }
    }

    protected static function cargarNumeroTarjetas($tarjetas){
        foreach ($tarjetas as $tarjeta) {
           try {
               $ultimosdigitos = "";
               $decrypted = Crypt::decrypt($tarjeta->NumeroTarjeta);
               $longitudTarjeta = strlen($decrypted);
               for ($i=0; $i <= $longitudTarjeta -3 ; $i++) { 
                   $ultimosdigitos .= "*";
               }
               $ultimosdigitos .= substr($decrypted, $longitudTarjeta -4, 3);
               $tarjeta->numero =  $ultimosdigitos;
           } catch (DecryptException $e) {
            return "Error al desencriptar";
           }
        }
    }

    protected static function determinarEntidad($numeroTarjeta)
    {
        if (preg_match("/^4[0-9]{6,}$/", $numeroTarjeta)){
            return "Visa";
        }
        elseif (preg_match("/^5[1-5][0-9]{5,}|222[1-9][0-9]{3,}|22[3-9][0-9]{4,}|2[3-6][0-9]{5,}|27[01][0-9]{4,}|2720[0-9]{3,}$/", $numeroTarjeta)) {
            return "MasterCard";
        }

        elseif (preg_match("/^3[47][0-9]{5,}$/", $numeroTarjeta)){
            return "American Express";
        }

        elseif (preg_match("/^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/", $numeroTarjeta)) {
            return "Diners Club";
        }
        else{
            return "Ninguna";
        }
    }
}


