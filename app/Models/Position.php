<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'Cargos';
    protected $primaryKey = 'IdCargo';


    protected $fillable = [
        'Sigla', 'NombreCargo', 'Activo', 'SoloAdmin'
    ];

}
