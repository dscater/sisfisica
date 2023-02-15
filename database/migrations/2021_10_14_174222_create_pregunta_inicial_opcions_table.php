<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaInicialOpcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_inicial_opcions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dip_id')->unsigned();
            $table->text('opcion');
            $table->integer('correcto');
            $table->timestamps();

            $table->foreign('dip_id')->references('id')->on('diagnostico_inicial_preguntas')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_inicial_opcions');
    }
}
