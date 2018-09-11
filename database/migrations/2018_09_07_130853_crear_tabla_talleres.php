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
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripción');
            $table->string('horario');
            $table->string('fecha');
            $table->string('thumb');
            $table->integer('id_grupo');
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
