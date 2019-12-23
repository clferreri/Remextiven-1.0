<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMonederoRemextiven extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BancMonederoRemextiven', function (Blueprint $table) {
            $table->tinyIncrements('IdCuentaRemextiven');
            $table->unsignedInteger('IdBanco');
            $table->string('TipoCuenta', 30);
            $table->string('NumeroCuenta', 30);
            $table->unsignedTinyInteger('IdMoneda');
            $table->decimal('Saldo', 10, 2);
            $table->decimal('SaldoInamovible', 8,2);
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
        Schema::dropIfExists('BancMonederoRemextiven');
    }
}
