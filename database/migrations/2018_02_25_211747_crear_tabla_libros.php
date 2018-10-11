<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLibros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->unique();
            $table->string('isbn')->nullable();
            $table->string('titulo');
            $table->text('sipnosis')->nullable();
            $table->smallInteger('paginas');
            $table->integer('id_autor');
            $table->foreign('id_autor')->references('id')->on('autores');
            $table->smallInteger('edicion');
            $table->string('thumb')->nullable();
            $table->integer('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos_libros');
            $table->boolean('destacado');
            $table->boolean('semanal');
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
        Schema::dropIfExists('libros');
    }
}
