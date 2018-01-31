<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionamentoPapeisPermissoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papeis_permissoes', function (Blueprint $table) {
            $table->integer('permissoes_id')->unsigned();
            $table->integer('papel_id')->unsigned();
            $table->timestamps();

            $table->foreign('permissoes_id')
                ->references('id')->on('permissoes')
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
        Schema::table('papeis_permissoes', function (Blueprint $table) {
            $table->dropForeign('papeis_permissoes_permissoes_id_foreign');
            $table->dropColumn('permissoes_id');

            $table->dropForeign('papeis_permissoes_papel_id_foreign');
            $table->dropColumn('papel_id');
        });

        Schema::dropIfExists('papeis_permissoes');
    }
}
