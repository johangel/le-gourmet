<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votos extends Model
{
    protected $fillable = [
      'usuarioId',
      'recetaId',
      'valor',
    ];
}
