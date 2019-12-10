<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMargenDeGanancia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MargenesDeGanancia', function (Blueprint $table) {
            $table->tinyIncrements('IdMargen');
            $table->string('TextoGanancia');
            $table->decimal('PorcentajeGanancia', 3, 2);
            $table->boolean('Actual');
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
        Schema::dropIfExists('MargenesDeGanancia');
    }
}
