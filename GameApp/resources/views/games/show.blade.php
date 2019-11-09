@extends('layouts.app')
@section('content')
    <h2 class="text-center">{{$game->title}}</h2>
    
    <!--
     checking for update message
    -->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->

        <p class="gInfo">Released {{$game->release}} | {{$game->genre}} | {{$game->perspective}} | {{$game->platform}}</p>
    <div class="imgFeature" style="margin: 0 auto;
    width: 30%;">
        <img src="{{asset($game->game_art)}}" style="margin: 0 auto;
    width: 100%;">
<p>{{$game->description}}</p>

<br>
<a href="{{route('games.edit',$game->id)}}" class="btn btn-primary float-right">Update</a>
<br><br>

<a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
<div class="clearfix"></div><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Username
                        </th>
                        <th>
                            Highscore
                        </th>
                        <th>
                            Verification
                        </th>
                    </tr>
                </thead>
                @if($scoreArray == 0)
                <!-- shows nothing -->
                @else
                <!-- Shows all member things -->
                @if($scoreArray == 0)
                @else
                @foreach($scoreArray as $score)
                @guest
                @elseif(Auth::user()->id == $score['user_id'])
                @php
                $hasScore = true
                @endphp
                @endif
                @endforeach
                @endif
                @foreach($scoreArray as $score)
                <tbody>
                    <tr>
                        <td>
                            <a href="{{route('scores.show',$score['score_id'])}}">
                                {{$score['name']}}</a>
                        </td>
                        <td>
                            <a href="{{route('scores.show',$score['score_id'])}}">
                                {{$score['score']}}</a>
                        </td>
                        <td>
                            <a href="{{ $score['score_verification_image'] }}">
                            <img src="{{asset($score['score_verification_image'])}}" style="margin: 0 auto; width: 100%;"></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    @guest
    @else
    @if($hasScore==true)
    <form class="form-inline" action="{{route('AddScoreToGamesController.deleteScore')}}" method="POST">
        {{csrf_field()}}
        <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
        <!--Sends to next page-->
        <input type='hidden' name='game_id' value='{{$game->id}}'>
        <!--Sends to next page-->
        <input type='submit' name='submit' value='Delete highscore' class="btn btn-success btn-block btn-text">
</div>
<br>
</form>
@else
<form class="form-inline" action="{{route('AddScoreToGamesController.addScore')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div>
        <input type="text" name="score" id="title" class="form-control {{$errors->has('score') ? 'is-invalid' : '' }}" value="{{old('score')}}" placeholder="Enter Highscore">
        @if($errors->has('score')) {{-- <-check if we have a validation error --}}
        <span class="invalid-feedback">
            {{$errors->first('score')}} {{-- <- Display the First validation error --}}
        </span>
        @endif
        <label for="score_verification_image" class="col-md-4 col-form-label text-md-right">Score verification image</label>
            <div class="col-md-6">
                <input id="score_verification_image" type="file" class="form-control file" name="score_verification_image">
            </div>
        <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
        <!--Sends to next page-->
        <input type='hidden' name='game_id' value='{{$game->id}}'>
        <!--Sends to next page-->
        <input type='submit' name='submit' value='Add new Highscore'>
    </div>
    <br>
</form>
@endif
@endif
<br><br>
</div>

<div class="modal fade" id="delete-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-description">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<form method="POST" id="delete-form" class="deleteF" action="{{route('games.destroy',$game->id)}}" class="hide">
    @csrf
    @method('DELETE')
</form>
@endsection