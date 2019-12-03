<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTiposSolicitudTransferencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TiposSolicitudTransferencia', function (Blueprint $table) {
            $table->tinyIncrements('IdTipo');
            $table->string('Tipo', 20);
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
        Schema::dropIfExists('TiposSolicitudTransferencia');
    }
}
