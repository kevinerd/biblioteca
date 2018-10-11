<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTalleres extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('talleres', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->unique();
            $table->string('nombre');
            $table->string('descripción');
            $table->string('horario');
            $table->date('fecha');
            $table->string('thumb')->nullable();
            $table->integer('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos_talleres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('talleres');
    }
}
