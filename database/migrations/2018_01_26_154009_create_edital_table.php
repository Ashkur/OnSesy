<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edital', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entidade');
            $table->string('numero')->unique();
            $table->integer('ano');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edital');
    }
}
