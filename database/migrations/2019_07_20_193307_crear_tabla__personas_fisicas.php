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
            $table->string('Nombre', 20);
            $table->string('PrimerApellido', 25);
            $table->string('SegundoApellido', 25); 
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
