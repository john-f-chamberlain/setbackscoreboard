<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Setback Scoreboard :: Entry Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/flatly/bootstrap.min.css" integrity="sha384-kCsv8pSAWtRge/+zcLDeqwoWhTQSUX2esQPYOsocgrg1eMj7T2wrTJP348T3mpBU" crossorigin="anonymous">
    <style>
    body{padding-top:120px}pre{background:#f7f7f9}@media (min-width: 768px){body>.navbar-transparent{box-shadow:none}body>.navbar-transparent .navbar-nav>.open>a{box-shadow:none}}#home{padding-top:0px}#home .navbar{transition:box-shadow 200ms ease-in}#home .navbar-brand .nav-link{display:inline-block;margin-right:-30px}#home .navbar-brand img{display:inline-block;margin:0 10px;width:30px}#home .btn{padding:0.6em 0.7em;box-shadow:none;font-size:0.7rem}.bs-docs-section{margin-top:4em}.bs-docs-section .page-header h1{padding:2rem 0;font-size:3rem}.dropdown-menu.show[aria-labelledby="themes"]{display:flex;width:420px;flex-wrap:wrap}.dropdown-menu.show[aria-labelledby="themes"] .dropdown-item{width:33.333%}.dropdown-menu.show[aria-labelledby="themes"] .dropdown-item:first-child{width:100%}.bs-component{position:relative}.bs-component+.bs-component{margin-top:1rem}.bs-component .card{margin-bottom:1rem}.bs-component .modal{position:relative;top:auto;right:auto;left:auto;bottom:auto;z-index:1;display:block}.bs-component .modal-dialog{width:90%}.bs-component .popover{position:relative;display:inline-block;width:220px;margin:20px}#source-button{position:absolute;top:0;right:0;z-index:100;font-weight:bold}#source-modal pre{max-height:calc(100vh - 11rem);background-color:rgba(0,0,0,0.7);color:rgba(255,255,255,0.7)}.nav-tabs{margin-bottom:15px}.progress{margin-bottom:10px}#footer{margin:5em 0}#footer li{float:left;margin-right:1.5em;margin-bottom:1.5em}#footer p{clear:left;margin-bottom:0}.splash{padding:12em 0 3em;background-color:#2196F3;color:#fff;text-align:center}.splash .logo{width:160px}.splash h1{font-size:3em;color:#fff}.splash #social{margin:2em 0 3em}.splash .alert{margin:2em 0;border:none}.splash .sponsor a{color:#fff}.section-tout{padding:6em 0 1em;border-bottom:1px solid rgba(0,0,0,0.05);background-color:#eaf1f1}.section-tout .fa{margin-right:0.2em}.section-tout p{margin-bottom:5em}.section-preview{padding:4em 0 4em}.section-preview .preview{margin-bottom:4em;background-color:#eaf1f1}.section-preview .preview img{max-width:100%}.section-preview .preview .image{position:relative}.section-preview .preview .image:before{box-shadow:inset 0 0 0 1px rgba(0,0,0,0.1);position:absolute;top:0;left:0;width:100%;height:100%;content:"";pointer-events:none}.section-preview .preview .options{padding:2em;border:1px solid rgba(0,0,0,0.05);border-top:none;text-align:center}.section-preview .preview .options p{margin-bottom:2em}.section-preview .dropdown-menu{text-align:left}.section-preview .lead{margin-bottom:2em}@media (max-width: 767px){.section-preview .image img{width:100%}}.sponsor img{max-width:100%}.sponsor #carbonads{max-width:240px;margin:0 auto}.sponsor .carbon-text{display:block;margin-top:1em;font-size:12px}.sponsor .carbon-poweredby{float:right;margin-top:1em;font-size:10px}@media (max-width: 767px){.splash{padding-top:8em}.splash .logo{width:100px}.splash h1{font-size:2em}#banner{margin-bottom:2em;text-align:center}}
    </style>

  </head>
  <body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="../" class="navbar-brand">Setback Scoreboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('display')}}">Scoreboard</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      @if ($errors->any())
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if (session('status') || isset($success))
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {!! session('status') ?? $success !!}
      </div>
      @endif
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
                                  @include('parts.player_dropdown', ['team_id' => 1, 'player_number' => 1, 'players' => $players])
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

    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
