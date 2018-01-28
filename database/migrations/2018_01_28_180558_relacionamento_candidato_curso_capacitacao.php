<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoCandidatoCursoCapacitacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->integer('curso_capacitacao_id')->unsigned();
            
            $table->foreign('curso_capacitacao_id')
            ->references('id')->on('curso_capacitacao')
            ->deleteOn('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->dropForeign('candidatos_curso_capacitacao_id_foreign');
            $table->dropColumn('curso_capacitacao_id');
        });
    }
}
