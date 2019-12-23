<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMonederoSocios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BancMonederoSociosRemextiven', function (Blueprint $table) {
            $table->tinyIncrements('IdMonedero');
            $table->unsignedInteger('IdUsuarioSocio');
            $table->decimal('SaldoPesos', 8, 2);
            $table->decimal('SaldoDolares', 9, 2);
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
        Schema::dropIfExists('BancMonederoSociosRemextiven');
    }
}
