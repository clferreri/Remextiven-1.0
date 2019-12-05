<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

class BankAccount extends Model
{
    protected $table = 'CuentasBancariasUsuariosR';
    protected $primaryKey = 'IdCuentaBancaria';

    protected $fillable = ['IdUsuario', 'IdBanco', 'TipoCuenta', 'NumeroCuenta', 'Alias'];


    public function getNombreBanco(){
        $banco = Bank::find($this->IdBanco);
        return $banco->NombreBanco();
    }

    protected static function cargarNombresBancos($cuentasBancarias){
        foreach ($cuentasBancarias as $cuenta) {
            $cuenta->nombre = $cuenta->getNombreBanco();
        }
    }

}
