<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTarjetasDeUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TarjetasUsuariosR', function (Blueprint $table) {
            $table->increments('IdTarjeta');
            $table->unsignedInteger('IdUsuario');
            $table->string('NombreTitular', 50);
            $table->string('NumeroTarjeta',60);
            $table->date('Vencimiento');
            $table->string('Entidad',50);
            $table->boolean('Activo')->default(true);
            $table->timestamps();


            $table->foreign('IdUsuario', 'FK_TarjetasUsuarios_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TarjetasUsuariosR');
    }
}
