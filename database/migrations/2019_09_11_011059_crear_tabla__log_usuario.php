<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLogUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LogsUsuariosR', function (Blueprint $table) {
            $table->increments('IdLog');
            $table->unsignedInteger('IdUsuario');
            $table->string('Log', 400);
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_Log_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LogsUsuariosR');
    }
}
