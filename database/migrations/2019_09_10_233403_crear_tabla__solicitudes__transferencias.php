<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSolicitudesTransferencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SolicitudesTransferencia', function (Blueprint $table) {
            $table->increments('IdSolicitudTransferencia');
            $table->unsignedInteger('IdUsuarioSolicita');
            $table->unsignedTinyInteger('IdEstadoTransferencia');
            $table->unsignedTinyInteger('IdTipoTransferencia');
            $table->decimal('MontoEnviar', 8, 2);
            $table->decimal('MontoComision', 8, 2);
            $table->decimal('MontoTotal', 8, 2);
            $table->unsignedTinyInteger('IdMoneda');
            $table->unsignedTinyInteger('IdMedioPago');
            $table->unsignedInteger('CotizacionVES');
            $table->unsignedInteger('IdUsuarioResponde')->nullable();
            $table->unsignedInteger('IdCuentaBancaria')->nullable();
            $table->unsignedInteger('IdCuentaBeneficiaria')->nullable();
            $table->date('FechaSolicitada');
            $table->date('FechaFinalizada')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SolicitudesTransferencia');
    }
}
