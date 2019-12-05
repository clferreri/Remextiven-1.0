<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferType extends Model
{
    protected $table = 'TipoSolicitudTransferencia';
    protected $primaryKey = 'IdTipo';


    protected $fillable = [
        'Tipo', 'Activo'
    ];
}
