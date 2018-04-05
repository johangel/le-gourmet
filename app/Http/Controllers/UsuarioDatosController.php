<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioDatos;

class UsuarioDatosController extends Controller
{
    public function get($id){
      $Informacion = UsuarioDatos::find($id);
      return $Informacion;
    }

    public function get2($name){
      $Informacion = UsuarioDatos::where('nombre', $name)->first();
      return $Informacion;
    }

    public function actualizar(Request $request, $id){
      $user = UsuarioDatos::find($id);
      $input = $request->all();

      if($request->input('descripcion') != ''){
      $user->descripcion = $request->input('descripcion');
      }

      if($request->input('facebook') != ''){
      $user->facebook = $request->input('facebook');
      }

      if($request->input('edad') != ''){
      $user->edad = $request->input('edad');
      }

      if($request->input('nacionalidad') != ''){
      $user->nacionalidad = $request->input('nacionalidad');
      }

      if($request->input('twitter') != ''){
      $user->twitter = $request->input('twitter');
      }

      if($request->input('correoUsuario') != ''){
      $user->correoUsuario = $request->input('correoUsuario');
      }

      if($request->input('blindMode') != ''){
      $user->blindmode = $request->input('blindMode');
      }

      if($request->input('imagen_perfil') != ''){
        $exploded = explode(',', $request->imagen_perfil);
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0],'jpeg'))
          $extension = 'jpg';
        else
          $extension = 'png';
        $filename = str_random().'.'.$extension;
        $path = public_path().'/fotosDePerfil/'.$filename;
        file_put_contents($path, $decoded);
        $user->imagen_perfil = $filename;
      }

      if($request->input('categoriasFavoritas') != ''){
      $user->categoriasFavoritas = $request->input('categoriasFavoritas');
      }

      $user->save();

    }
}
