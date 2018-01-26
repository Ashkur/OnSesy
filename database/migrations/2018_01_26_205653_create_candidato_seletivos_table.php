<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatoSeletivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_seletivos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo_capacitacao');
            $table->integer('pontucao_capacitacao');
            $table->text('titulo_graduacao');
            $table->integer('pontuacao_capacitacao');
            $table->text('titulo_experiencia');
            $table->integer('pontuacao_experiencia');
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
        Schema::dropIfExists('candidato_seletivos');
    }
}
