<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaRolesUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RolesUsuariosR', function (Blueprint $table) {
            $table->tinyIncrements('IdRol');
            $table->string('Rol', 20)->unique();
            $table->boolean('Activo')->default(1);
            $table->boolean('SoloEmpleado')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TipoUsuariosR');
    }
}
