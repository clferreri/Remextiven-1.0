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
            $table->unsignedInteger('IdDigitadorResuelve');
            $table->date('FechaReporte');
            $table->timestamps();


            $table->foreign('IdUsuarioReclama', 'FK_Reclamo_UsuarioReclama')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdTipoReclamo', 'FK_Reclamo_UsuarioReclama')->references('IdTipoReclamo')->on('TiposReclamo')->onDelete('restrict');
            $table->foreign('IdUsuarioReportado', 'FK_Reclamo_UsuarioReportado')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdPrioridad', 'FK_Reclamo_Prioridad')->references('IdPrioridad')->on('Prioridades')->onDelete('restrict');
            $table->foreign('IdEstadoReclamo', 'FK_Reclamo_Estado')->references('IdEstado')->on('EstadosReclamo')->onDelete('restrict');
            $table->foreign('IdDigitadorResuelve', 'FK_Reclamo_DigitadorResuelve')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            

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
