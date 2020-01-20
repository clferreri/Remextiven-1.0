<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferLink extends Model
{
    protected $table = 'LinksTransferencias';
    protected $primaryKey = 'IdLinkTransferencia';


    protected $fillable = [
        'Parametro', 'Transferencia' , 'IdTransferencia', 'Activo'
    ];
}
