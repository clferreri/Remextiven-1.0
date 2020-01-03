<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferStatus extends Model
{
    protected $table = 'EstadosSolicitudTransferencia';
    protected $primaryKey = 'IdEstado';


    protected $fillable = [
        'Estado', 'Activo'
    ];
}
