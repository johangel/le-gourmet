<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioRecetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_recetas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('comentario');
            $table->integer('idUsuario');
            $table->string('nombreUsuario');
            $table->integer('idReceta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_recetas');
    }
}
