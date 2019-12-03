<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPersonaJuridica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PersonaJR', function (Blueprint $table) {
            $table->increments('IdPersonaJ');
            $table->unsignedInteger('IdUsuario');
            $table->string('RazonSocial', 30);
            $table->string('NombreFantasia', 30);
            $table->string('IdTributaria', 30);
            $table->string('FormaJuridica', 10);
            $table->string('FechaConformacion');
            $table->unsignedTinyInteger('IdPais');
            $table->unsignedSmallInteger('IdCIudad');
            $table->string('Direccion', 25);
            $table->string('NumeroPuerta', 10);
            $table->string('Telefono', 20);
            $table->string('Telefono2', 20)->nullable();
            $table->string('CodigoPostal', 20)->nullable();
            $table->timestamps();
        
            $table->foreign('IdUsuario', 'FK_PersonaJR_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PersonaJR');
    }
}
