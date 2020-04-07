<?php

use App\Libro;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->string('titulo');
            $table->string('sipnosis');
            $table->number('paginas')->unsigned();
            $table->number('id_autor')->unsigned();
            $table->number('edicion')->unsigned();
            $table->string('thumb')->nullable();
            $table->number('id_grupo')->unsigned();
            $table->boolean('destacado')->default(Libro::NO_DESTACADO);
            $table->boolean('semanal')->default(Libro::NO_SEMANAL);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_autor')->references('id')->on('autores');
            $table->foreign('id_grupo')->references('id')->on('grupos_libros');
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
