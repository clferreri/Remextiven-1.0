<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMotivoAnulacionSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MotivoAnulacionSolicitud', function (Blueprint $table) {
            $table->increments('IdAnulacion');
            $table->string('Motivo', 200);
            $table->unsignedTinyInteger('IdTipoAnulacion');
            $table->unsignedBigInteger('IdSolicitudTransferencia');
            $table->boolean('AnulacionPorCliente');
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
        Schema::dropIfExists('MotivoAnulacionSolicitud');
    }
}
