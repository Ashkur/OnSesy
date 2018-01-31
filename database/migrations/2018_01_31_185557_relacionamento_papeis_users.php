<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoPapeisUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('papeis_users', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
            $table->integer('papel_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->deleteOn('cascade');

            $table->foreign('papel_id')
                ->references('id')->on('papeis')
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
        Schema::table('papeis_users', function (Blueprint $table) {
            $table->dropForeign('papeis_users_user_id_foreign');
            $table->dropColumn('user_id');

            $table->dropForeign('papeis_users_papel_id_foreign');
            $table->dropColumn('papel_id');
        });

        Schema::dropIfExists('papeis_users');
    }
}
