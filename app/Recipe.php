<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $casts = [
      'ingredients' => 'array'
  ];

  protected $fillable = ['name','ingredients','category','timesVoted','totalVotes','instructions','description','author'];
}
