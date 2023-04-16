<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nombre', 45);
            $table->string('apellido', 45);
            $table->string('usuario_id',45);
            $table->string('email',45);
            $table->primary('id');
            //$table->foreign('usuario_id')->references('id')->on('users');
        });

       //Schema::table('personas', function (Blueprint $table) {

      // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
