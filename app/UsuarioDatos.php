<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioDatos extends Model
{
  protected $casts = [
      'categoriasFavoritas' => 'array'
  ];
  protected $fillable = [
    'blindMode',
    'facebook',
    'twitter',
    'nacionalidad',
    'edad',
    'correoUsuario',
    'descripcion',
    'imagen_perfil',
    'cumpleaños',
    'categoriasFavoritas'
  ];

  }
