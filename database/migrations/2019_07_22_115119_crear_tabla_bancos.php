<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBancos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BancosR', function (Blueprint $table) {
            $table->increments('idBanco');
            $table->string('Banco');
            $table->unsignedTinyInteger('IdPais');
            $table->string('CodigoBanco')->nullable();
            $table->boolean('Activo')->default(1);
            $table->boolean('MedioPagoR')->default(0);
            $table->timestamps();

            $table->foreign('IdPais', 'FK_Bancos_Pais')->references('IdPais')->on('Paises')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BancosR');
    }
}
