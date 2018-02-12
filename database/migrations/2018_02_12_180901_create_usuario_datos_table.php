<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_datos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('blindMode')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('correoUsuario');
            $table->string('descripcion')->nullable();
            $table->string('cumpleaños')->nullable();
            $table->string('categoriasFavoritas')->nullable();
            $table->string('imagen_perfil')->nullable();
            $table->string('edad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_datos');
    }
}
