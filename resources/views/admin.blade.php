@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card bg-light mb-3">
      <div class="card-header">Add Player</div>
      <div class="card-body">
        <form method="POST" action="{{route('add_player')}}">
          {{csrf_field()}}
          <div class="form-group">
            <labelf>Player Name</label>
            <input type="text" name="name" class="form-control" autofocus>
          </div>
          <button type="submit" name="action" value="add_player" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
  <table class="table table-striped table-bordered text-center">
    <thead class="thead-dark">
      <tr>
        <th class="text-left">Player Name</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($players as $player)
      <tr>
        <td class="text-left">{{$player->name}}</td>
        <td>{{ $player->active == 1 ? "Yes" : "No" }}</td>
        <td>
          {{--[<a href="#" class="text-danger font-weight-bold">Delete</a>]--}}
          @if($player->active)
            [<a href="{{route('toggle_player', [$player->id])}}" class="text-warning font-weight-bold">Disable</a>]
          @else
          [<a href="{{route('toggle_player', [$player->id])}}" class="text-warning font-weight-bold">Enable</a>]
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection


@section('javascript')

@endsection