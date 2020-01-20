<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalPerson extends Model
{
    protected $table = 'personajr';
    protected $primaryKey = 'IdPersonaJ';



    protected $fillable = [
        'IdUsuario', 'RazonSocial', 'NombreFantasia', 'IdTributaria','FormaJuridica', 'FechaConformacion', 'IdPais', 'IdCiudad', 'Direccion', 'NumeroPuerta', 'Telefono'
    ];

    public function Usuario(){
        return $this->hasOne('App\User', 'IdUsuarioR', 'IdUsuario');
    }

    public function Pais(){
        return $this->hasOne('App\Models\Pais', 'IdPais', 'IdPais');
    }
}
