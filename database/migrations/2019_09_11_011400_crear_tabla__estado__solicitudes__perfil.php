<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstadoSolicitudesPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EstadosSolicitudPerfil', function (Blueprint $table) {
            $table->tinyIncrements('IdEstado');
            $table->string('Estado', 20);
            $table->boolean('Activo');
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
        Schema::dropIfExists('EstadosSolicitudPerfil');
    }
}
