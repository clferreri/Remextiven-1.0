<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'Paises';
    protected $primaryKey = 'IdPais';


    protected $fillable = [
        'Pais', 'Codigo' , 'Prefijo', 'Activo', 'ImagenBandera'
    ];

    
    protected static function getPais($idPais){
        return $pais = Pais::where('IdPais', $idPais)->first();
    }
}
