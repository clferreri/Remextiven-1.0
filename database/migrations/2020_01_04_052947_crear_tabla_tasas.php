<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTasas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tasas', function (Blueprint $table) {
            $table->increments('IdTasa');
            $table->decimal('USDCOP', 9, 2);
            $table->decimal('UYUCOP', 7, 2);
            $table->decimal('VESCOP', 8, 4);
            $table->decimal('USDVES', 9, 2);
            $table->decimal('UYUVES', 7, 2);
            $table->decimal('USDUYU', 5, 2);
            $table->decimal('TasaBanescoUSD', 9 ,2);
            $table->decimal('TasaOtroUSD', 9, 2);
            $table->decimal('TasaBanescoUYU', 7, 2);
            $table->decimal('TasaOtroUYU', 7 , 2);
            $table->unsignedInteger('IdUsuarioCarga');
            $table->date('Fecha');
            $table->timestamps();

            $table->foreign('IdUsuarioCarga', 'FK_Usuario_Carga')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasas');
    }
}
