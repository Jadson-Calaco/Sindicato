<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('categoria_id')->unsigned()->index();
            $table->integer('banco_id')->unsigned()->index();
            $table->dateTime('data')->nullable();
            $table->dateTime('data2')->nullable();
            $table->text('titulo')->nullable();
            $table->text('subtitulo');
            $table->text('texto')->nullable();
            $table->string('foto','255')->default('NULL');
            $table->string('fotos_extras','255')->nullable()->default('N');
            $table->string('creditos_fotos','255')->nullable()->default('');
            $table->enum('destaque',['S','N'])->nullable()->default('N');
            $table->enum('destaque_FS',['S','N'])->nullable()->default('N');
            $table->string('tags','255');
            $table->string('visitas','9')->nullable()->default('0');
            $table->enum('status',['S','N'])->nullable()->default('S');
            $table->string('fonte','2000');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('noticias_cat');
            $table->foreign('banco_id')->references('id')->on('noticias_bancos');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
