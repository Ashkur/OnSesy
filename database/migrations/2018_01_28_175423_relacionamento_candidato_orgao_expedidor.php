<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoCandidatoOrgaoExpedidor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidatos', function (Blueprint $table) {
            $table->integer('orgao_expedidor_id')->unsigned();
            
            $table->foreign('orgao_expedidor_id')
            ->references('id')->on('orgao_expedidor')
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
            $table->dropForeign('candidatos_orgao_expedidor_id_foreign');
            $table->dropColumn('orgao_expedidor_id');
        });
    }
}
