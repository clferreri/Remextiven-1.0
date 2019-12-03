<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'Ciudades';
    protected $primaryKey = 'IdPersonaF';

    protected $fillable = [
        'IdPais', 'Ciudad', 'Activo'
    ];

    
    protected static function getCiudad($idCiudad){
        return $ciudad = Ciudad::where('IdCiudad', $idCiudad)->first();
     }
 
}
