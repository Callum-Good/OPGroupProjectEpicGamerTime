@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('bannedMessage'))
            <div class="alert alert-danger">{{ session('bannedMessage') }}</div>
        @endif

        @guest
        <h2>Welcome Epic Gamer</h2>
        @else
        <h2>Welcome {{ Auth::user()->name }}</h2>
        @endif
            
        </div>
    </div>
        @guest
    <div class="homeMenu">
        <ul class="homeList">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('games.index') }}">Browse Games</a></li>
            <li><a href="{{ route('groups.index') }}">Browse Groups</a></li>
        </ul>
    </div>
        @else
    <div class="homeMenulog">
        <ul class="homeList">
            <li><a href="{{ route('games.index') }}">Browse Games</a></li>
            <li><a href="{{ route('groups.index') }}">Browse Groups</a></li>
        </ul>
    </div>
        @endif

    @if(is_null($featuredGame))
    
   
    <h3>there are no games!</h3>
    
    @else
    <a href="{{route('games.show',$featuredGame->id)}}"><div class="featuredGame">
        <h3>
        {{$featuredGame->title}}
        </h3>
         <img class="featuredGame" src="{{asset($featuredGame->game_art)}}"style= "height:450px">
    </div> </a>
    @endif
    @if($top5!=0)
        <div class="yourGroups">
            <h3>High Scores</h3>

            @foreach($top5 as $t)
            
            <a href="{{route('games.show',$t['game_id'])}}">
                <div class="ftdGrp">
                    <img src="{{asset($t['gameImage'])}}"style= "height:70px">
                    
                    <h4>{{$t['game']}}</h4>
                    <p>Top Score: {{$t['score']}}</p>
                    <a href="{{route('users.show',$t['user_id'])}}"><p>Player: {{$t['name']}}</p></a>
                </div></a>
            @endforeach
        </div>
    @endif

    </div>
  

    
</div>
@endsection
