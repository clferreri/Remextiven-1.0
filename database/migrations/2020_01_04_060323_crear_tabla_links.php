<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LinksTransferencias', function (Blueprint $table) {
            $table->increments('IdLinkTransferencia');
            $table->string('Parametro', 15);
            $table->string('Transferencia', 20);
            $table->unsignedInteger('IdTransferencia');
            $table->boolean('Activo');
            $table->timestamps();

            $table->foreign('IdTransferencia', 'FK_Link_SolicitudTransferencia')->references('IdSolicitudTransferencia')->on('SolicitudesTransferencia')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linksTransferencias');
    }
}
