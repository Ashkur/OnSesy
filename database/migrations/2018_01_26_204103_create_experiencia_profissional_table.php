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
            $table->string('empresa');
            //$table->string('cargo');
            //$table->string('funcao');
            //$table->integer('tempo');
            //$table->string('mes_ano_tempo');
            $table->text('descricao');
            //$table->date('data_inicio');
            //$table->date('data_fim');
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
        Schema::dropIfExists('experiencia_profissional');
    }
}
