<?php

use Illuminate\Database\Seeder;
use App\recipes;
class RecipesSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(recipes::class,5)->create();  //
    }
}
