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
        Schema::table('comunicados', function (Blueprint $table) {
            $table->integer('seletivo_id')->unsigned();
            
            $table->foreign('seletivo_id')
            ->references('id')->on('seletivos')
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
        Schema::table('comunicados', function (Blueprint $table) {
            $table->dropForeign('comunicados_seletivo_id_foreign');
            $table->dropColumn('seletivo_id');
        });
    }
}
