<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaCursoEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_curso_estudiantes', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('detalle_curso_id')->unsigned();
            $table->foreign('detalle_curso_id')->references('id')->on('detalle_cursos')->onDelete('cascade');
            $table->integer('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_curso_estudiantes');
    }
}
