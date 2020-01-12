<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'SolicitudesTransferencia';
    protected $primaryKey = 'IdSolicitudTransferencia';


    protected $fillable = [
        'IdUsuarioSolicita', 'IdEstadoTransferencia' , 'IdTipoTransferencia', 'IdMedioPago', 'IdUsuarioResponde', 'IdCuentaBancaria', 'IdCuentaBeneficiaria', 'FechaSolicitada'
    ];


    

    //RELACIONES-------------------
    public function Cotizacion(){
        return $this->hasOne('App\Models\TransferQuotation', 'IdSolicitudTransferencia', 'IdSolicitudTransferencia');
    }

    public function Estado(){
        return $this->hasOne('App\Models\TransferStatus', 'IdEstado', 'IdEstadoTransferencia');
    }

    public function UsuarioTransferencia(){
        return $this->hasOne('App\User', 'IdUsuarioR', 'IdUsuarioSolicita');
    }

    public function Tipo(){
        return $this->hasOne('App\Models\TransferType', 'IdTipo', 'IdTipoTransferencia');
    }

    public function CuentaBeneficiaria(){
        return $this->hasOne('App\Models\BeneficiaryAccount', 'IdCuenta' ,'IdCuentaBeneficiaria');
    }

    public function MedioPago(){
        return $this->hasOne('App\Models\PaymentMethod', 'IdMedioPago', 'IdMedioPago');
    }


}
