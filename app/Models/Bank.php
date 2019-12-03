<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'BancosR';
    protected $primaryKey = 'IdBanco';


    protected $fillable = ['IdBanco', 'Banco', 'IdPais', 'CodigoBanco', 'Activo', 'MedioPagoR'];


    public function NombreBanco()
    {
        return $this->Banco;
    }
}
