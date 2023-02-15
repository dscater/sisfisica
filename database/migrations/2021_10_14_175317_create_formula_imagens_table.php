<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulaImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formula_imagens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formula_id')->unsigned();
            $table->string('imagen', 255);
            $table->integer('nro_paso');
            $table->timestamps();
            $table->foreign('formula_id')->references('id')->on('formulas')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formula_imagens');
    }
}
