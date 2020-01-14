<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCargos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cargos', function (Blueprint $table) {
            $table->tinyIncrements('IdCargo');
            $table->string('Sigla', 8);
            $table->string('NombreCargo', 35);
            $table->boolean('Activo')->default(1);
            $table->boolean('SoloAdmin')->default(0);
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
        Schema::dropIfExists('Cargos');
    }
}
