<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipes;

class RecipeController extends Controller
{

    public function getRecipes(){
      $recipes = recipes::all();
      return $recipes;
    }

    public function create(){
      return view('recipe.crearReceta');
    }

    public function store(Request $request)
    {
      $exploded = explode(',', $request->image);

      $decoded = base64_decode($exploded[1]);

      if(str_contains($exploded[0],'jpeg'))
        $extension = 'jpg';
      else
        $extension = 'png';

      $filename = str_random().'.'.$extension;

      $path = public_path().'/images/'.$filename;

      file_put_contents($path, $decoded);

      recipes::create($request->except('img') +[
        'img' => $filename
      ]);

      return;
    }
    public function show(){
      return view('recipe.vistaReceta');
    }

}
