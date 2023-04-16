<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->integer('asesor_id');
            $table->foreign('asesor_id')->references('id')->on('asesors')->onDelete('cascade');
            $table->integer('estudiante_id');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('duracion');
            
            $table->text('descripcion')->nullable();

            $table->string('tipo', 45);

            $table->string('estado', 20);

            $table->string('backgroundColor', 20);
            $table->string('textColor', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reunion');
    }
}
