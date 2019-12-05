<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $table = 'RolesUsuariosR';
    protected $primaryKey = 'IdRol';


    protected $fillable = [
        'Rol', 'Activo'
    ];
}
