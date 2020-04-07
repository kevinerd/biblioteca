<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalleresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talleres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('dias');
            $table->string('descripcion');
            $table->string('thumb')->nullable();
            $table->number('id_grupo')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_grupo')->references('id')->on('grupos_talleres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talleres');
    }
}
