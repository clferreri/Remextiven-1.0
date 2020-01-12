<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCotizacionesTransferencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SolicitudesTransferenciaCotizacion', function (Blueprint $table) {
            $table->increments('IdCotizacion');
            $table->unsignedInteger('IdSolicitudTransferencia');
            $table->unsignedTinyInteger('IdMoneda');
            $table->decimal('MontoEnviar', 8, 2);
            $table->decimal('MontoRecibir', 11,2);
            $table->decimal('Cambio', 5, 2)->nullable();
            $table->decimal('CotizacionVES', 9, 2)->nullable();
            $table->unsignedtinyInteger('MargenGanancia')->default(10);
            $table->decimal('CotizacionRealVES', 8, 2)->nullable();       
            $table->decimal('ComisionEstimada', 8, 2)->nullable();
            $table->decimal('ComisionReal', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('IdSolicitudTransferencia', 'FK_CotizacionTransferencia_SolicitudTransferencia')->references('IdSolicitudTransferencia')->on('SolicitudesTransferencia')->onDelete('restrict');
            $table->foreign('IdMoneda', 'FK_CotizacionTransferencia_Moneda')->references('IdMoneda')->on('Monedas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SolicitudesTransferenciaCotizacion');
    }
}
