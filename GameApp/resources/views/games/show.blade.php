@extends('layouts.app')
@section('content')
    <h2 class="text-center">{{$game->title}}</h2>
    
        <p class="gInfo">Released {{$game->release}} | {{$game->genre}} | {{$game->perspective}} | {{$game->platform}}</p>
    
    <p>{{$game->body}}</p>
    
    <br>
    <a href="{{route('games.edit',$game->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>
  <!--  Delete for game should be taken out at some stage 
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
            <div class="modal-body">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" action="{{route('games.destroy',$game->id)}}" class="hide">
        @csrf
        @method('DELETE')
    </form>-->

@endsection