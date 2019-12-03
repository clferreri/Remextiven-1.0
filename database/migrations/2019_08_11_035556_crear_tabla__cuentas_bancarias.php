<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCuentasBancarias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CuentasBancariasUsuariosR', function (Blueprint $table) {
            $table->increments('IdCuentaBancaria');
            $table->unsignedInteger('IdUsuario');
            $table->unsignedInteger('IdBanco');
            $table->enum('TipoCuenta', ['Ahorro', 'Corriente']);
            $table->string('NumeroCuenta', 50)->nullable();
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_CuentaBancaria_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdBanco', 'FK_CuentaBancaria_Banco')->references('IdBanco')->on('BancosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CuentasBancariasUsuariosR');
    }
}
