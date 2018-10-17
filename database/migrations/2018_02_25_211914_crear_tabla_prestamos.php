<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->unique();
            $table->integer('id_libro');
            $table->foreign('id_libro')->references('id')->on('libros');
            $table->integer('id_socio');
            $table->foreign('id_socio')->references('id')->on('socios');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_devuelto')->nullable();
            $table->boolean('devuelto');
            $table->boolean('aviso');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
