<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoEditalSeletivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seletivos', function (Blueprint $table) {
            $table->integer('edital_id')->unsigned();
            
            $table->foreign('edital_id')
            ->references('id')->on('edital')
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
            $table->dropForeign('seletivos_edital_id_foreign');
            $table->dropColumn('edital_id');
        });
    }
}
