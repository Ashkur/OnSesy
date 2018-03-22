<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoCandidatoSeletivosSeletivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidato_seletivos', function (Blueprint $table) {
            $table->integer('seletivo_id')->unsigned();
            
            $table->foreign('seletivo_id')
            ->references('id')->on('seletivos')
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
        Schema::table('candidato_seletivos', function (Blueprint $table) {
            $table->dropForeign('candidato_seletivos_seletivo_id_foreign');
            $table->dropColumn('seletivo_id');
        });
    }
}
