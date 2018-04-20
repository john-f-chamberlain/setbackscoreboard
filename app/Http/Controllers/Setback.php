<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;

class Setback extends Controller
{
    public function show_score(){
      $players = \App\Player::where('active', 1)->get()->sort(function($a, $b){
        $a_total = $a->total_score();
        $b_total = $b->total_score();
        if($a_total == $b_total){
          $diff = strcmp ($a->name, $b->name);
          if($diff < 0){
            return -1;
          }
          if($diff > 0){
            return 1;
          }
          return 0;
        }

        return ($a_total < $b_total) ? 1 : -1;
      });

      header('Refresh: 2;');
      //dd($players);
      if(count($players) % 4 != 0){
        return view('display_waiting');
      }
      return view('display')->with('players', $players);

    }


    public function show_form(){
      $players = \App\Player::where('active', 1)->orderBy('name','asc')->get();
      return view('form')->with('players', $players);
    }

    public function proc_form(Request $request){
      //dd($request->all());
      Validator::make($request->all(), [
        'team_1_player_1' => ['required','integer', 'different:team_1_player_2', 'different:team_2_player_1', 'different:team_2_player_2', 'exists:players,id'],
        'team_1_player_2' => ['required','integer', 'different:team_1_player_1', 'different:team_2_player_1', 'different:team_2_player_2', 'exists:players,id'],
        'team_2_player_1' => ['required','integer', 'different:team_1_player_1', 'different:team_1_player_2', 'different:team_2_player_2', 'exists:players,id'],
        'team_2_player_2' => ['required','integer', 'different:team_1_player_1', 'different:team_1_player_2', 'different:team_2_player_1', 'exists:players,id'],
        'team_1'          => ['required','integer', 'max:90'],
        'team_2'          => ['required','integer', 'max:90'],
        'game'            => ['required','integer']
      ])->validate();

      // These should never fail since everything is validated on the client side, but we'll check anyway.

      

      $playerdata = [
        'team_1_1' => $request->input('team_1_player_1'),
        'team_1_2' => $request->input('team_1_player_2'),
        'team_2_1' => $request->input('team_2_player_1'),
        'team_2_2' => $request->input('team_2_player_2')
      ];

      foreach($playerdata as $key => $player){
        if(starts_with($key, 'team_1')){
          $score     = $request->input('team_1');
        }else{
          $score     = $request->input('team_2');
        }
        $game_id   = $request->input('game');

        $score = \App\Score::updateOrCreate([
          'player_id' => $player,
          'game_id'   => $request->input('game')
        ],[
          'score'     => $score
        ]);
      }
      
      Session::flash('success', 'The scores have been submitted successfully');
      return redirect()->back();


    }
}
