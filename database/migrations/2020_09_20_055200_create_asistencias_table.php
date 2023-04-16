<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('clase_id')->unsigned();
            $table->integer('estudiante_id');
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');


            $table->tinyInteger('presencialidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}
