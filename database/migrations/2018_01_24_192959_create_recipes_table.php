<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->json('ingredients');
          $table->string('category');
          $table->integer('timesVoted');
          $table->integer('totalvotes');
          $table->text('instructions');
          $table->string('description');
          $table->string('author');
          $table->string('origen');
          $table->string('img');
          $table->string('horas');
          $table->string('min');
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
        Schema::dropIfExists('Recipe');
    }
}
