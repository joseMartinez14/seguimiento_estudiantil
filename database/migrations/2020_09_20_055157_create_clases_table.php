<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('detalle_curso_id')->unsigned();
            $table->foreign('detalle_curso_id')->references('id')->on('detalle_cursos')->onDelete('cascade');
            $table->string('aula_codigo',45)->nullable();
            $table->foreign('aula_codigo')->references('codigo')->on('aulas')->onDelete('cascade');

            $table->time('hora_inicio');
            $table->time('hora_final')->nullable();
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
