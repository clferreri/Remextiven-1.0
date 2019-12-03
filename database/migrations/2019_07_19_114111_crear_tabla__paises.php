<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPaises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Paises', function (Blueprint $table) {
            $table->tinyIncrements('IdPais');
            $table->string('Pais', 25);
            $table->string('Codigo', 5);
            $table->string('Prefijo', 6);
            $table->boolean('Activo');
            $table->string('ImagenBandera', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Paises');
    }
}
