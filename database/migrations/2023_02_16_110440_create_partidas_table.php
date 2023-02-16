<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("estado");
            $table->integer("t_mins");
            $table->integer("t_segs");
            $table->integer("nivel_actual");
            $table->integer("nro_ejercicio");
            $table->integer("actual");
            $table->integer("puntaje");
            $table->integer("contador");
            $table->integer("correctos_nivel");
            $table->string("jugados", 255);
            $table->text("pasos");
            $table->text("pasos_arrastrados");
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
        Schema::dropIfExists('partidas');
    }
}
