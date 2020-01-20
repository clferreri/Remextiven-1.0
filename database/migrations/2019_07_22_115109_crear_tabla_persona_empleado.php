<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPersonaEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PersonaER', function (Blueprint $table) {
            $table->increments('IdPersonaE');
            $table->unsignedInteger('IdUsuario');
            $table->string('PrimerNombre', 20);
            $table->string('SegundoNombre', 20)->nullable();
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
            $table->string('Telefono', 30)->nullable();
            $table->string('Telefono2', 30)->nullable();
            $table->unsignedTinyInteger('IdCargo');
            $table->string('CorreoPersonal', 30)->nullable(); 
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_PersonaER_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
            $table->foreign('IdCargo', 'FK_PersonaER_Cargo')->references('IdCargo')->on('Cargos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PersonaER');
    }
}
