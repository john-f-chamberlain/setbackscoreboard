<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Setback Scoreboard :: Entry Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/flatly/bootstrap.min.css" integrity="sha384-kCsv8pSAWtRge/+zcLDeqwoWhTQSUX2esQPYOsocgrg1eMj7T2wrTJP348T3mpBU" crossorigin="anonymous">
    <style>
      
    </style>

  </head>
  <body>
      <table class="table  table-striped">
      <thead class="thead-dark">
        <tr>
          <th></th>
            <?php $g = 1; ?>
            @while( $g <= round(count($players)/4) )
              <th>Game {{ $g }}</td>
              <?php $g ++; ?>
            @endwhile
            <th>Total</th>
        </tr>
      </thead>
      @foreach($players as $player)
        @if($player->newscore())
        <tr style="background-color:#ff00ff;">
        @else
        <tr>
        @endif
          <th>{{ $player->name }}</th>
          <?php $i = 1; $score = 0;?>
          @while( $i <= round(count($players)/4) )
            <td>{{ $player->score($i) }}</td>
            <?php $score += $player->score($i); $i ++; ?>
          @endwhile
          <td>{{ $score == 0 ? '' : $score }}</td>
        </tr>
        @endforeach


    </table>
    
  </body>

</html>