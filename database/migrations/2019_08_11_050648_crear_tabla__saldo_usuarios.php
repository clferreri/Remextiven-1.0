<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSaldoUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SaldosR', function (Blueprint $table) {
            $table->increments('IdSaldo');
            $table->unsignedInteger('IdUsuario');
            $table->decimal('SaldoActivo', 8, 2);
            $table->decimal('SaldoPendienteCarga', 8, 2);
            $table->decimal('SaldoPendienteBaja', 8, 2);
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_UsuarioSaldoR_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SaldosR');
    }
}
