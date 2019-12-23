<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferQuotation extends Model
{
    protected $table = 'SolicitudesTransferenciaCotizacion';
    protected $primaryKey = 'IdCotizacion';

    //CotizacionVES -> Cuanto se cotizo el VES de la transferencia
    //CotizacionRealVES -> Cuanto se deberia haber cotizado

    //ComisionEstimada -> Lo que se estima de ganancia segun el sistema
    //ComisionReal -> Lo uqe se gano realmente


    protected $fillable = [
        'IdSolicitudTransferencia', 'IdMoneda' , 'MontoEnviar', 'Cambio', 'CotizacionVES', 'CotizacionRealVES', 'MargenGanancia', 'ComisionEstimada', 'ComisionReal'
    ];
}
