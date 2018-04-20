<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at'
];

    function scores(){
      return $this->hasMany(\App\Score::class);
    }


    function score($id){
      $data = \App\Score::where('player_id', $this->id)->where('game_id', $id)->first();
      if($data){
        return $data->score;
      }
      return false;
    }

    function total_score(){
      $data = $this->scores;
      $total = 0;
      foreach($data as $score){

        $total += $score->score;
      }

      return $total;
    }

    function newscore(){
      $data = $this->scores;
      if(!$data) return false;
      foreach($data as $score){
        if($score->updated_at->gte(now()->subSeconds(50))){
          return true;
        }
      }
      return false;
    }
}
