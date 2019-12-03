<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReclamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reclamos', function (Blueprint $table) {
            $table->increments('IdReclamo');
            $table->unsignedInteger('IdUsuarioReclama');
            $table->string('IdTipoReclamo');
            $table->string('Motivo', 400);
            $table->unsignedInteger('IdUsuarioReportado')->nullable();
            $table->unsignedTinyInteger('IdPrioridad');
            $table->unsignedTinyInteger('IdEstadoReclamo');
            $table->date('FechaReporte');
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
        Schema::dropIfExists('Reclamos');
    }
}
