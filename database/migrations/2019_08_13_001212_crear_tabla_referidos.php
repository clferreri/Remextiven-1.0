<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReferidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ReferidosR', function (Blueprint $table) {
            $table->increments('IdReferencia');
            $table->unsignedInteger('IdUsuarioRefiere');
            $table->unsignedInteger('IdUsuarioReferido');
            $table->timestamps();

            $table->foreign('IdUsuarioRefiere', 'FK_UsuarioRefiere_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdUsuarioReferido', 'FK_UsuarioReferido_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ReferidosR');
    }
}
