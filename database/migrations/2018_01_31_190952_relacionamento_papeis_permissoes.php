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
            $table->integer('permissao_id')->unsigned();
            $table->integer('papel_id')->unsigned();
            $table->timestamps();

            $table->foreign('permissao_id')
                ->references('id')->on('permissoes')
                ->onDelete('cascade');

            $table->foreign('papel_id')
                ->references('id')->on('papeis')
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
        Schema::table('papeis_permissoes', function (Blueprint $table) {
            $table->dropForeign('papeis_permissoes_permissao_id_foreign');
            $table->dropColumn('permissao_id');

            $table->dropForeign('papeis_permissoes_papel_id_foreign');
            $table->dropColumn('papel_id');
        });

        Schema::dropIfExists('papeis_permissoes');
    }
}
