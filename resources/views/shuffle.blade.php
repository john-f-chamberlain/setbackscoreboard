@extends('layouts.main')


@section('content')

<div class="row">
  <?php $table = 1; ?>
  @foreach($players as $player)
    @if($loop->first)
    <div class="col-md-3">
    <div class="card mb-3">
      <div class="card-header"><h2>Table {{$table++}}</h2></div>
      <div class="card-body">
        <ul>
    @endif
       <li><h4>{{$player->name}}</h4></li>
    @if($loop->iteration %4 == 0 && !$loop->last)
       </ol>
      </div>
     </div>
     </div>
     <div class="col-md-3">
     <div class="card mb-3">
       <div class="card-header"><h2>Table {{$table++}}</h2></div>
        <div class="card-body">
          <ul>
    @endif
    @if($loop->last)
      </ol>
     </div>
    </div>
    </div>
    @endif
  @endforeach
</div>


       
	



@endsection
