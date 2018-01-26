<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoCapacitacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_capacitacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_curso');
            $table->text('descricao');
            $table->integer('ano_conclusao');
            $table->integer('carga_horaria');
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
        Schema::dropIfExists('curso_capacitacao');
    }
}
