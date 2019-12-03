<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCuentasBeneficiarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CuentasBeneficiarios', function (Blueprint $table) {
            $table->increments('IdCuenta');
            $table->unsignedInteger('IdUsuario');
            $table->string('Banco', 50);
            $table->enum('TipoCuenta', ['Ahorro', 'Corriente']);
            $table->string('NumeroCuenta', 50);
            $table->string('NombreTitular', 20);
            $table->string('ApellidoTitular', 20);
            $table->string('TipoDocumento', 6);
            $table->string('Documento', 20);
            $table->string('Alias', 20);
            $table->timestamps();

            $table->foreign('IdUsuario', 'FK_CuentasBeneficiarios_Usuario')->references('IdUsuarioR')->on('UsuariosR')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CuentasBeneficiarios');
    }
}
