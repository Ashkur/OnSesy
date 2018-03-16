<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->char('sexo', 1);
            $table->string('filiacao1');
            $table->string('filiacao2');
            $table->boolean('pne');
            $table->boolean('atendimento_especial');
            $table->string('telefone1');
            $table->string('telefone2');
            $table->string('raca');
            $table->string('email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
