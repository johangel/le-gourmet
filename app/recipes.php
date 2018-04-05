<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
  protected $casts = [
      'ingredients' => 'array'
  ];

  protected $fillable = ['name',
  'ingredients',
  'category',
  'UpVotes',
  'DownVotes',
  'instructions',
  'description',
  'author',
  'origen',
  'img',
  'horas',
  'min'
];
}
