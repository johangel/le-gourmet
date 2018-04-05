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

    public function editar($id, Request $request){
      $receta = recipes::find($id);
      if($request->name != ''){
        $receta->name = $request->name;
      }
      if($request->description != ''){
        $receta->description = $request->description;
      }
      if($request->instructions != ''){
        $receta->instructions = $request->instructions;
      }
      $receta->save();
      return($receta);
    }

    public function getRecipesProfile($name){
      $Informacion = recipes::where('author', urldecode($name))->get();
      return $Informacion;
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

    public function eliminarReceta($id){
      recipes::where('id', $id)->delete();
      return;
    }

    public function CagrgarReceta($id){
      $receta = recipes::where('id', $id)->get();
      return $receta;
    }

}
