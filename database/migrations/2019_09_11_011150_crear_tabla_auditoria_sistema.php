<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAuditoriaSistema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AuditoriaSistema', function (Blueprint $table) {
            $table->increments('IdAuditoria');
            $table->unsignedInteger('IdUsuario');
            $table->string('Descripcion', 250);
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_Auditoria_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditoriaSistema');
    }
}
