<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentario_receta extends Model
{
  protected $fillable = [
    'comentario',
    'idUsuario',
    'nombreUsuario',
    'idReceta',
  ];
}
