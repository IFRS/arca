<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas_turnos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('oferta_id')->unsigned();
            $table->foreign('oferta_id')->references('id')->on('ofertas')->onDelete('cascade');

            $table->integer('turno_id')->unsigned();
            $table->foreign('turno_id')->references('id')->on('turnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas_turnos');
    }
}
