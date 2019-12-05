<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancellationType extends Model
{
    protected $table = 'TipoAnulacion';
    protected $primaryKey = 'IdTipo';

    protected $fillable = ['Tipo', 'Activo'];
}
