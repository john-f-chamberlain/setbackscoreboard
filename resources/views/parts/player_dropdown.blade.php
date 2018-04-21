<select required="requried" name="team_{{$team_id}}_player_{{$player_number}}" id="t{{$team_id}}-p{{$player_number}}" @if(isset($autofocus))autofocus @endif class="form-control">
  <option value="" hidden selected>Select...</option>
  @foreach($players as $player)
    <option value="{{$player->id}}" id="team:{{$team_id}}-part:{{$player_number}}-player:{{$player->id}}">{{$player->name}}</option>
  @endforeach
</select>