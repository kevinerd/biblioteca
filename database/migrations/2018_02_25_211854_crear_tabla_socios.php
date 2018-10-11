<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSocios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->increments('id')->autoIncrement()->unique();;
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('documento');
            $table->string('domicilio');
            $table->string('telefono')->nullable();
            $table->string('mail')->nullable();
            $table->string('fecha_nac');
            $table->integer('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos_socios');
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
        Schema::dropIfExists('socios');
    }
}
