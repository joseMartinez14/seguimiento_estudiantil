<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaAsesorEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_asesor_estudiantes', function (Blueprint $table) {
            $table->id('id');

            $table->integer('asesor_id');
            $table->integer('estudiante_id');
            $table->foreign('asesor_id')->references('id')->on('asesors')->onDelete('cascade');
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
        Schema::dropIfExists('lista_asesor_estudiantes');
    }
}
