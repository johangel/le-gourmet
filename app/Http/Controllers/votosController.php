<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Votos;
use App\recipes;
class votosController extends Controller
{

  public function enviarVoto(Request $request){
        $recetaId = $request->input('recetaId');
        $usuarioId = $request->input('usuarioId');
        $valor = $request->input('valor');
        $voto = Votos::where('recetaId' ,$recetaId)->where('usuarioId', $usuarioId)->first();
        $receta = recipes::find($recetaId);

        if($voto === null){
          Votos::create($request->all());
          $receta->UpVotes = $receta->UpVotes + $valor;
          $receta->save();
          return($valor);
        }else{
          if($valor == 1 && $voto->valor == -1){
            $voto->valor = 1;
            $voto->save();
            $receta->UpVotes = $receta->UpVotes + 2;
            $receta->save();
              return (2);
          }else if($valor == -1 && $voto->valor == 1){
            $voto->valor = -1;
            $voto->save();
            $receta->UpVotes = $receta->UpVotes - 2;
            $receta->save();
            return (-2);
          }else{
            return (0);
          }
        }
  }

}
