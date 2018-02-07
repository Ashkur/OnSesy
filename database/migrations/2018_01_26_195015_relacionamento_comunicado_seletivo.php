<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoComunicadoSeletivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seletivos', function (Blueprint $table) {
            $table->integer('comunicado_id')->unsigned();
            
            $table->foreign('comunicado_id')
            ->references('id')->on('comunicados')
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
        Schema::table('seletivos', function (Blueprint $table) {
            $table->dropForeign('seletivos_comunicado_id_foreign');
            $table->dropColumn('comunicado_id');
        });
    }
}
