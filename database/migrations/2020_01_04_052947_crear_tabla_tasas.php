<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTasas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasas', function (Blueprint $table) {
            $table->increments('IdTasa');
            $table->decimal('USD/COP', 9, 2);
            $table->decimal('UYU/COP', 7, 2);
            $table->decimal('VES/COP', 8, 4);
            $table->decimal('USD/VES', 9, 2);
            $table->decimal('UYU/VES', 7, 2);
            $table->decimal('USD/UYU', 5, 2);
            $table->unsignedInteger('IdUsuarioCarga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasas');
    }
}
