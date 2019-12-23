<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMediosDePago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MediosDePago', function (Blueprint $table) {
            $table->tinyIncrements('IdMedioPago');
            $table->string('MedioDePago', 30);
            $table->string('Descripcion', 100);
            $table->string('TextoCosto', 45);
            $table->decimal('Costo', 6, 2);
            $table->boolean('Activo');
            $table->boolean('PagoCliente');
            $table->string('UrlImagen', 150);
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
        Schema::dropIfExists('MediosDePago');
    }
}
