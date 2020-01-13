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
            $table->unsignedTinyInteger('IdMedioPago');
            $table->unsignedInteger('IdUsuarioResponde')->nullable();
            $table->unsignedInteger('IdCuentaBancaria')->nullable();
            $table->unsignedInteger('IdCuentaBeneficiaria')->nullable();
            $table->date('FechaSolicitada');
            $table->date('FechaFinalizada')->nullable();
            $table->string('ReciboBancario', 25)->nullable();
            $table->timestamps();

            $table->foreign('IdUsuarioSolicita', 'FK_SolicitudTransferencia_UsuarioSolicita')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdEstadoTransferencia', 'FK_SolicitudTransferencia_EstadoTransferencia')->references('IdEstado')->on('EstadosSolicitudTransferencia')->onDelete('restrict');
            $table->foreign('IdTipoTransferencia', 'FK_SolicitudTransferencia_TipoTransferencia')->references('IdTipo')->on('TiposSolicitudTransferencia')->onDelete('restrict');
            $table->foreign('IdUsuarioResponde', 'FK_SolicitudTransferencia_UsuarioResponde')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdCuentaBancaria', 'FK_SolicitudTransferencia_CuentaBancaria')->references('IdCuentaBancaria')->on('CuentasBancariasUsuariosR')->onDelete('restrict');
            $table->foreign('IdCuentaBeneficiaria', 'FK_SolicitudTransferencia_CuentaBeneficiaria')->references('IdCuenta')->on('CuentasBeneficiarios')->onDelete('restrict');
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
