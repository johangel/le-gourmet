<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comentario_receta;
class ComentarioRecetaController extends Controller
{
    public function EnviarComentario(Request $request){
      comentario_receta::create($request->all());
      return;
    }

    public function CargarComentarios($id){
      $comentario = comentario_receta::where('idReceta', $id)->get();
      return $comentario;
    }
}
