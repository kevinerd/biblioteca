<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->unique();
            $table->string('nombre');
            $table->date('fecha');
            $table->time('hora')->nullable();
            $table->text('descripcion');
            $table->string('thumb')->nullable();
            $table->integer('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos_eventos');
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
        Schema::dropIfExists('eventos');
    }
}
