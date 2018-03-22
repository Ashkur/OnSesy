<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciaProfissionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia_profissional', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidato_id')->unsigned();
            $table->string('empresa');
            $table->string('cargo');
            $table->string('funcao');
            $table->string('tempo');
            $table->text('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
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
        Schema::dropIfExists('experiencia_profissional');
    }
}
