<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSolicitudesCambioPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SolicitudesCambioPerfil', function (Blueprint $table) {
            $table->increments('IdSolicitudCambio');
            $table->unsignedInteger('IdUsuarioSolicita');
            $table->unsignedTinyInteger('IdTipoCambio');
            $table->string('MotivoCambio', 400);
            $table->unsignedInteger('idDigitadorResponsable')->nullable();
            $table->unsignedInteger('IdDigitadorAutoriza')->nullable();
            $table->date('FechaSolicitud');
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
        Schema::dropIfExists('SolicitudesCambioPerfil');
    }
}
