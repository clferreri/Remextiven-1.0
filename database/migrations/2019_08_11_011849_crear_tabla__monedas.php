<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMonedas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Monedas', function (Blueprint $table) {
            $table->tinyIncrements('IdMoneda');
            $table->string('Moneda', 20);
            $table->string('CodigoValor', 6); 
            $table->string('CodigoTexto', 6); 
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
        Schema::dropIfExists('Monedas');
    }
}
