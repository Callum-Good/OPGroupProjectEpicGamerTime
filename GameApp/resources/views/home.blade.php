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
    
    <a href="{{route('games.show',$featuredGame->id)}}"><div class="featuredGame">
        <h3>
        
        {{$featuredGame->title}}
        </h3>
         <img class="featuredGame" src="{{asset($featuredGame->game_art)}}"style= "height:400px">
    </div> </a>

    @guest
    <div class="yourGroups">
        <a href=""><h3>Popular Groups</h3></a>
        <a href=""><div class="ftdGrp">
            <img src="images/bioshock.jpg">
            <h4>Bioshock Speed Run</h4>
            <p>Top Score: 30min 2s</p>
            <p>Player: XXxxjonnyxxXX</p>
        </div></a>
        <a href=""><div class="ftdGrp">
        <img src="images/pubg.jpg">
            <h4>PUBG Chicken Dinners</h4>
            <p>Top Score: 100</p>
            <p>Player: pbandj</p>
        </div></a>
        <a href=""><div class="ftdGrp">
        <img src="images/minecraft.jpg">
            <h4>Minecraft Gold Digger</h4>
            <p>Top Score: 20,000 Blocks</p>
            <p>Player: mineCraftHero</p>
        </div></a>
        <a href=""><div class="ftdGrp">
        <img src="images/farmingSim.jpg">
            <h4>Farming Sim Cow Tipper</h4>
            <p>Top Score: 7</p>
            <p>Player: jstdatip</p>
        </div></a>
        <a href=""><div class="ftdGrp last">
            <img src="images/halo5.jpg">
            <h4>Halo 5 Legendary Speed</h4>
            <p>Top Score: 1h 20mins</p>
            <p>Player: cheif117</p>
        </div></a>
    </div>
    @else
    <div class="yourGroups">
    <a href=""><h3>Your Groups</h3></a>
    <a href=""><div class="ftdGrp">
            <img src="images/bioshock.jpg">
            <h4>Bioshock Speed Run</h4>
            <p>Top Score: 30min 2s</p>
            <p>Player: XXxxjonnyxxXX</p>
        </div></a>
        <a href=""><div class="ftdGrp">
        <img src="images/pubg.jpg">
            <h4>PUBG Chicken Dinners</h4>
            <p>Top Score: 100</p>
            <p>Player: pbandj</p>
        </div></a>
        <a href=""><div class="ftdGrp">
        <img src="images/minecraft.jpg">
            <h4>Minecraft Gold Digger</h4>
            <p>Top Score: 20,000 Blocks</p>
            <p>Player: mineCraftHero</p>
        </div></a>
        <a href=""><div class="ftdGrp">
        <img src="images/farmingSim.jpg">
            <h4>Farming Sim Cow Tipper</h4>
            <p>Top Score: 7</p>
            <p>Player: jstdatip</p>
        </div></a>
        <a href=""><div class="ftdGrp last">
            <img src="images/halo5.jpg">
            <h4>Halo 5 Legendary Speed</h4>
            <p>Top Score: 1h 20mins</p>
            <p>Player: cheif117</p>
        </div></a>
    </div>
    </div>
    @endif

    
</div>
@endsection
