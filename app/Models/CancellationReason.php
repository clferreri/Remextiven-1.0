<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancellationReason extends Model
{
    protected $table = 'MotivoAnulacionSolicitud';
    protected $primaryKey = 'IdAnulacion';

    protected $fillable = ['Motivo', 'IdTipoAnulacion'];

}
