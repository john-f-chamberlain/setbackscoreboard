<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at'
];

  protected $fillable = [
    'score', 'player_id', 'game_id'
  ];
}
