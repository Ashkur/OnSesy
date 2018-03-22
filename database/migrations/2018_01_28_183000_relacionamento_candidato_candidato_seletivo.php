<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoCandidatoCandidatoSeletivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidato_seletivos', function (Blueprint $table) {
            $table->integer('candidato_id')->unsigned();
            
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
        Schema::table('candidato_seletivos', function (Blueprint $table) {
            $table->dropForeign('candidato_seletivos_candidato_id_foreign');
            $table->dropColumn('candidato_id');
        });
    }
}
