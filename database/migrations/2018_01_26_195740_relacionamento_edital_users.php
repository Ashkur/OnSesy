<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoEditalUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edital', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::table('edital', function (Blueprint $table) {
            $table->dropForeign('edital_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
