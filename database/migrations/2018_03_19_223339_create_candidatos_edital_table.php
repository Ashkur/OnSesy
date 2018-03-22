<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosEditalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos_edital', function (Blueprint $table) {
            $table->integer('candidato_id')->unsigned();
            $table->integer('edital_id')->unsigned();
            $table->timestamps();

            $table->foreign('edital_id')
            ->references('id')->on('edital')
            ->onDelete('cascade');

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
        Schema::dropIfExists('candidatos_edital');
    }
}
