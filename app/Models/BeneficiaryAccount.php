<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeneficiaryAccount extends Model
{
    protected $table = 'CuentasBeneficiarios';
    protected $primaryKey = 'IdCuenta';

    protected $fillable = [
        'IdUsuario', 'IdBanco', 'TipoCuenta', 'NumeroCuenta', 'NombreTitular', 'ApellidoTitular', 'TipoDocumento', 'Documento', 'Alias'
    ];
}
