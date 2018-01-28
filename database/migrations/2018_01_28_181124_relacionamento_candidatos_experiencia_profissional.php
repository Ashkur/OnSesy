<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoCandidatosExperienciaProfissional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiencia_profissional', function (Blueprint $table) {
            $table->integer('candidato_id')->unsigned();
            
            $table->foreign('candidato_id')
            ->references('id')->on('candidatos')
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
        Schema::table('experiencia_profissional', function (Blueprint $table) {
            $table->dropForeign('experiencia_profissional_candidato_id_foreign');
            $table->dropColumn('candidato_id');
        });
    }
}
