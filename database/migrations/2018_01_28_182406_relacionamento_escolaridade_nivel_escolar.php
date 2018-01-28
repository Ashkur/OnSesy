<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoEscolaridadeNivelEscolar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escolaridades', function (Blueprint $table) {
            $table->integer('nivel_escolar_id')->unsigned();
            
            $table->foreign('nivel_escolar_id')
            ->references('id')->on('nivel_escolar')
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
        Schema::table('escolaridades', function (Blueprint $table) {
            $table->dropForeign('escolaridades_nivel_escolar_id_foreign');
            $table->dropColumn('nivel_escolar_id');
        });
    }
}
