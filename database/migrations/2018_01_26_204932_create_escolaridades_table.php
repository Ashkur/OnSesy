<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscolaridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolaridades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidato_id')->unsigned();
            $table->string('nivel_escolar');
            $table->string('instituicao');
            $table->string('nome_curso');
            $table->integer('ano_conclusao');
            $table->timestamps();

            $table->foreign('candidato_id')
            ->references('id')->on('candidatos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escolaridades');
    }
}
