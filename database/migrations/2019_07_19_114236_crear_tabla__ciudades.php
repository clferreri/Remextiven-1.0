<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ciudades', function (Blueprint $table) {
            //atributos
            $table->increments('IdCiudad');
            $table->unsignedTinyInteger('IdPais');
            $table->string('Ciudad', 25);
            $table->boolean('Activo');

            //Claves foraneas
            $table->foreign('IdPais', 'FK_Ciudad_Pais')->references('IdPais')->on('Paises')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ciudades');
    }
}
