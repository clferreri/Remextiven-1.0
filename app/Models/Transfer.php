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
    public function CotizacionTransferencia(){
            return $this->hasOne('App\Models\TransferQuotation', 'IdSolicitudTransferencia', 'IdSolicitudTransferencia');
    }

    public function EstadoTransferencia(){
            return $this->hasOne('App\Models\TransferStatus', 'IdEstado', 'IdEstadoTransferencia');
    }

    public function UsuarioTransferencia(){
            return $this->hasOne('App\User', 'IdUsuarioR', 'IdUsuarioSolicita');
    }

    public function DatosCliente(){
        $usu = $this->hasOne('App\User', 'IdUsuarioR', 'IdUsuarioSolicita');
    }


}
