<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();

            $table->integer('pai_id')->unsigned()->nullable();
            $table->foreign('pai_id')->references('id')->on('niveis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveis');
    }
}
