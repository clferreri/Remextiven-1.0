<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPersonasFisicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PersonasFR', function (Blueprint $table) {
            $table->increments('IdPersonaF');
            $table->unsignedInteger('IdUsuario');
            $table->string('PrimerNombre', 20);
            $table->string('PrimerApellido', 25);
            $table->string('SegundoApellido', 25)->nullable(); 
            $table->string('Documento', 20);
            $table->string('TipoDocumento', 6);
            $table->date('FechaNacimiento');
            $table->enum('Sexo', ['Masculino', 'Femenino', 'Otro']);
            $table->unsignedTinyInteger('IdPaisDocumento');
            $table->unsignedTinyInteger('IdPais');
            $table->unsignedInteger('IdCiudad');
            $table->string('Direccion');
            $table->unsignedMediumInteger('NumeroPuerta');
            $table->unsignedMediumInteger('CodigoPostal')->nullable();
            $table->string('Telefono', '30');
            $table->string('Telefono2', '30')->nullable();
            $table->timestamps(); 

            $table->foreign('IdUsuario', 'FK_PersonaFR_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdPaisDocumento', 'FK_PersonaFR_PaisDocumento')->references('IdPais')->on('Paises')->onDelete('restrict');
            $table->foreign('IdPais', 'FK_PersonaFR_PaisResidencia')->references('IdPais')->on('Paises')->onDelete('restrict');
            $table->foreign('IdCiudad', 'FK_PersonaFR_CiudadResidencia')->references('IdCiudad')->on('Ciudades')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PersonasFR');
    }
}
