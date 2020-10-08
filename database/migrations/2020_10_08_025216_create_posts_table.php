<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //$table->id();
            $table->increments('id_post');
            $table->string('titulo', 150);
            $table->text('contenido')->nullable();
            $table->unsignedInteger('id_autor');
            $table->timestamp('fecha_creacion', 4)->nullable();
            $table->timestamp('fecha_actualizacion', 4)->nullable();
//            $table->timestamp('fecha_borrado', 4)->nullable();
            
            $table->foreign('id_autor')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
