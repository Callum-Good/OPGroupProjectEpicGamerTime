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
    </div>
    <p>{{$game->description}}</p>
    
    <br>
    <a href="{{route('games.edit',$game->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>
  
  <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
              
                 
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
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" class="deleteF" action="{{route('games.destroy',$game->id)}}" class="hide">
        @csrf
        @method('DELETE')
    </form>

@endsection