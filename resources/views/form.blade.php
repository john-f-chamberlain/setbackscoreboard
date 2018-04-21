@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col-md-4 mb-3">
    <div class="card bg-light">
        <div class="card-header">Instructions</div>
        <div class="card-body">
          <h4 class="card-title">Read Carefully</h4>
          <p class="card-text">
            <ul>
              <li>Select both players from each team using the dropdowns</li>
              <li>Enter the score for each team</li>
              <li>Select the game number from the dropdown</li>
              <li>Click Submit Scores</li>
            </ul>
          </p>
        </div>
      </div>
  </div>
  <div class="col-md-8 mb-3">
    <div class="card bg-light mb-3">
      <div class="card-body">
        <form action="{{route('proc')}}" method="POST">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <div class="card border-success mb-3">
                <div class="card-body">
                  <fieldset>
                    <legend>Team 1</legend>
                    <div class="form-group">
                        <label>Player 1:</label>
                        @include('parts.player_dropdown', ['team_id' => 1, 'player_number' => 1, 'players' => $players, 'autofocus' => 'autofocus'])
                      </div>
                      <div class="form-group">
                        <label>Player 2:</label>
                        @include('parts.player_dropdown', ['team_id' => 1, 'player_number' => 2, 'players' => $players])
                      </div>
                      <div class="form-group">
                        <label>Score:</label>
                        <input type="number" name="team_1" required="required" max="90" class="form-control">
                      </div>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card border-warning mb-3">
                <div class="card-body">
                  <fieldset>
                    <legend>Team 2</legend>
                    <div class="form-group">
                      <label>Player 1:</label>
                      @include('parts.player_dropdown', ['team_id' => 2, 'player_number' => 1, 'players' => $players])
                    </div>
                    <div class="form-group">
                      <label>Player 2:</label>
                      @include('parts.player_dropdown', ['team_id' => 2, 'player_number' => 2, 'players' => $players])
                    </div>
                    <div class="form-group">
                      <label>Score:</label>
                      <input type="number" name="team_2" required="required" max="90" class="form-control">
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card border-primary mb-3">
                <div class="card-body">
                  <div class="form-group">
                    <label>Game Number:</label>
                    <select name="game" required="required" class="form-control">
                      <option value="" hidden selected>Select...</option>
                      <?php $g=1; ?>
                      @while($g <= round(count($players)/4))
                      <option value="{{ $g }}">Game {{ $g++ }}</option>
                      @endwhile
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-block btn-lg btn-primary" style="height:75px;">Submit Score</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
  $(document).ready(function () {
    $('select').change(function () {
      if($(this).val() == '' || $(this).attr("name") == "game"){return;}
      if ($('select option[value="' + $(this).val() + '"]:selected').length > 1) {
        $(this).val('').change();
        alert('You have already selected this option previously - please choose another.');
        
        
      }
    });
  });
</script>
@endsection
