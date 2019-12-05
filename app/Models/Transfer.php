<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'SolicitudesTransferencia';
    protected $primaryKey = 'IdSolicitudTransferencia';


    protected $fillable = [
        'IdUsuarioSolicita', 'IdEstadoTransferencia' , 'IdTipoTransferencia', 'MontoEnviar', 'MontoComision', 'MontoTotal', 'IdMoneda', 'Cambio', 'IdMedioPago', 'CotizacionVES', 'IdUsuarioResponde', 'IdCuentaBancaria', 'IdCuentaBeneficiaria', 'FechaSolicitada'
    ];
}
