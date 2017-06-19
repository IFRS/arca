<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->text('descricao');
            $table->string('coordenador_nome');
            $table->string('coordenador_email');
            $table->string('coordenador_titulacao');
            $table->smallInteger('carga_horaria');
            $table->string('duracao');
            $table->string('autorizacao');
            $table->tinyInteger('nota_mec');
            $table->text('estrutura_fisica');

            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');

            $table->integer('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campi')->onDelete('cascade');

            $table->integer('modalidade_id')->unsigned();
            $table->foreign('modalidade_id')->references('id')->on('modalidades');

            $table->integer('nivel_id')->unsigned();
            $table->foreign('nivel_id')->references('id')->on('niveis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
