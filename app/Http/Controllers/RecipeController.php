<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{

    public function getRecipes(){
      $recipes = Recipe::all();
      return $recipes;
    }

    public function create(){
      return view('recipe.crearReceta');
    }

    public function store(){

    }

}
