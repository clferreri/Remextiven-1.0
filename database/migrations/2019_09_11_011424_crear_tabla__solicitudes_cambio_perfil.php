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
            $table->unsignedInteger('IdDigitadorResponsable')->nullable();
            $table->unsignedInteger('IdDigitadorAutoriza')->nullable();
            $table->date('FechaSolicitud');
            $table->timestamps();

            $table->foreign('IdUsuarioSolicita', 'FK_SolicitudCambioPerfil_UsuarioSolicita')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdTipoCambio', 'FK_SolicitudCambioPerfil_TipoCambio')->references('IdTipoCambio')->on('TiposCambioPerfil')->onDelete('restrict');
            $table->foreign('IdDigitadorResponsable', 'FK_SolicitudCambioPerfil_DigitadorResponsable')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdDigitadorAutoriza', 'FK_SolicitudCambioPerfil_DigitadorAutoriza')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            
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
