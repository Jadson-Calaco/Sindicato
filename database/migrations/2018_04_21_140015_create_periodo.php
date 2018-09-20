<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coloniadeferias_pre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('nome')->unique();
            $table->string('semana_1','255')->nullable();
            $table->string('semana_2','255')->nullable();
            $table->string('semana_3','255')->nullable();
            $table->string('semana_4','255')->nullable();
            $table->string('semana_5','255');
            $table->enum('status',['S','N'])->nullable()->default('S');
            
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
        Schema::dropIfExists('coloniadeferias_pre');
    }
}
