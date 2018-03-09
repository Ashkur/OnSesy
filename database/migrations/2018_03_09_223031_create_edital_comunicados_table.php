<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditalComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edital_comunicados', function (Blueprint $table) {
            $table->integer('edital_id')->unsigned();
            $table->integer('comunicado_id')->unsigned();
            $table->timestamps();

            $table->foreign('edital_id')
            ->references('id')->on('edital')
            ->deleteOn('cascade');

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
        Schema::dropIfExists('edital_comunicados');
    }
}
