<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVerificacionesDeUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VerificacionesUsuariosR', function (Blueprint $table) {
            $table->increments('IdVerificacion');
            $table->unsignedInteger('IdUsuario');
            $table->unsignedInteger('IdDigitador')->nullable();
            $table->unsignedTinyInteger('IdPais')->nullable();
            $table->string('RutaImagenDocumento', 100);
            $table->string('RutaImagenVerificacion', 100);
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_VerificacionUsuario_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdDigitador', 'FK_VerificacionDigitador_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdPais', 'FK_VerificacionPais_Pais')->references('IdPais')->on('Paises')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VerificacionesUsuariosR');
    }
}
