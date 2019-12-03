<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('IdMovimiento');
            $table->unsignedInteger('IdUsuarioEnvia');
            $table->unsignedInteger('IdUsuarioRecibe');
            $table->decimal('Monto',8,2);
            $table->timestamps();

            $table->foreign('IdUsuarioEnvia', 'FK_Movimiento_UsuarioEnvia')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdUsuarioRecibe', 'FK_Movimiento_UsuarioRecibe')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
