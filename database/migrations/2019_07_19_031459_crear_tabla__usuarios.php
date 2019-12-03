<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UsuariosR', function (Blueprint $table) {
            $table->increments('IdUsuarioR');
            $table->char('TipoUsuario', 1);
            $table->string('Email', 35);
            $table->string('Password', 60);
            $table->date('FechaRegistro');
            $table->unsignedTinyInteger('IdRol');
            $table->boolean('Activo');
            $table->boolean('Verificado')->default(0);
            $table->string('PinTransacciones')->nullable();
            $table->string('TokenActivacion', 40)->nullable();
            $table->boolean('NewsLetters');
            $table->string('TokenReferido', 20);
            $table->string('RutaImagen', 40);
            $table->boolean('EsReferido')->default(1);
            $table->date('UltimoLogin')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();

            
            //Claves foraneas
            $table->foreign('IdRol', 'FK_Usuario_Rol')->references('IdRol')->on('RolesUsuariosR')->onDelete('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UsuariosR');
    }
}
