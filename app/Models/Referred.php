<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referred extends Model
{
    protected $table = 'ReferidosR';
    protected $primaryKey = 'IdReferencia';


    protected $fillable = ['IdUsuarioRefiere', 'IdUsuarioReferido'];
}
