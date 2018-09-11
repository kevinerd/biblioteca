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
            $table->increments('id');
            $table->string('isbn')->nullable();
            $table->string('titulo');
            $table->text('sipnosis')->nullable();
            $table->smallInteger('paginas');
            $table->integer('idAutor');
            $table->smallInteger('edicion');
            $table->string('thumb');
            $table->integer('id_grupo');
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
