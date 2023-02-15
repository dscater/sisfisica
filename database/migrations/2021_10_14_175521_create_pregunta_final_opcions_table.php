<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaFinalOpcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_final_opcions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dfp_id')->unsigned();
            $table->text('opcion');
            $table->integer('correcto');
            $table->timestamps();
            $table->foreign('dfp_id')->references('id')->on('diagnostico_final_preguntas')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pregunta_final_opcions');
    }
}
