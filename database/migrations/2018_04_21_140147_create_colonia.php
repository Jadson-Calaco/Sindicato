<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColonia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coloniaferias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('periodo_id')->unsigned()->index();
            $table->string('semana','255')->nullable();
            $table->string('nome','255')->nullable();
            $table->string('matricula')->nullable()->unique();
            $table->string('cpf')->nullable()->unique();
            $table->string('banco')->nullable();
            $table->string('agencia','255')->nullable();
            $table->string('telefone','255')->nullable();
            $table->string('regional','255')->nullable();
            $table->foreign('periodo_id')->references('id')->on('coloniadeferias_pre');
            $table->foreign('user_id')->references('id')->on('users');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coloniaferias');
    }
}
