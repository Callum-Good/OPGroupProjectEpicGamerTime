@extends('layouts.app')
@section('content')
    <h2 class="text-center">Games</h2>
    <!--
     checking for delete or create message
    -->

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
  
   <!-- <ul class="list-group py-3 mb-3">-->
   <p class="gInfo">@sortablelink('title') | @sortablelink('description') | 
   @sortablelink('release') | @sortablelink('genre') | @sortablelink('perspective') | @sortablelink('platform')</p>

    <div class="tableRow">
        @forelse($games as $game)

            <!--<li class="list-group-item my-2">-->
    <a class="gpLink" href="{{route('games.show',$game->id)}}">
    <div class="card" style="
    display: flow-root;">
    <div class="imgCen" style="width:160px;
    padding:5px;
    float: left;
    margin-right:10px;">
    <img class="card-img-top" src="{{asset($game->game_art)}}" alt="Card image cap" style="height:150px; width:150px;">
    </div>
    <div class="card-body">
      <h3 >{{$game->title}}</h3>
      <p class="gInfo">Released {{$game->release}} | {{$game->genre}} | {{$game->perspective}} | {{$game->platform}}</p>
<ul>
    <li class="tableListItem">{{str_limit($game->description,200)}}</li>
    </ul>     
</div>
    </div>
    </a>
         
        @empty
            <h4 class="text-center">No Games Found!</h4>
            
        @endforelse
        </div>


    <div class="d-flex justify-content-center">
        {{$games->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection