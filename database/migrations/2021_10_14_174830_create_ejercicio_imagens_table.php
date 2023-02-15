<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjercicioImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicio_imagens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ejercicio_id')->unsigned();
            $table->string('imagen', 255);
            $table->integer('nro_paso');
            $table->timestamps();

            $table->foreign('ejercicio_id')->references('id')->on('ejercicios')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejercicio_imagens');
    }
}
