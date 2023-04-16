<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_cursos', function (Blueprint $table) {
            $table->id('id');
            
            $table->integer('tutor_id');
            $table->string('curso_codigo',45);
            $table->foreign('curso_codigo')->references('codigo')->on('cursos')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');

            $table->integer('anno');
            $table->string('periodo', 45);
            $table->integer('num_periodo');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('dia', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_cursos');
    }
}
