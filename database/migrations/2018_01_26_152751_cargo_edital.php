<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CargoEdital extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_edital', function (Blueprint $table) {
            $table->increments('id');
            $table->string('curso');
            $table->string('turno_trabalho');
            $table->integer('tempo_experiencia');
            $table->integer('numero_vagas');
            $table->float('remuneracao');
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
        Schema::dropIfExists('cargo_edital');
    }
}
