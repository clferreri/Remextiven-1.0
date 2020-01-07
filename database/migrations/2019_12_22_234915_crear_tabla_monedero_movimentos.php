<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMonederoMovimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BancMonederoMovimientosRemextiven', function (Blueprint $table) {
            $table->increments('IdMovimiento');
            $table->unsignedTinyInteger('IdTipoMovimento');
            $table->string('Detalle', 200);
            $table->unsignedTinyInteger('IdMoneda');
            $table->decimal('Monto', 8, 2);
            $table->enum('Accion', ['Ingreso', 'Retiro']);
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
        Schema::dropIfExists('BancMonederoMovimientosRemextiven');
    }
}
