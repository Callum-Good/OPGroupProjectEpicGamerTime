@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
            <li><a href="">Browse Groups</a></li>
        </ul>
    </div>
        @else
    <div class="homeMenulog">
        <ul class="homeList">
            <li><a href="{{ route('games.index') }}">Browse Games</a></li>
            <li><a href="">Browse Groups</a></li>
        </ul>
    </div>
        @endif
    
    <a href=""><div class="featuredGame">
        <h3>Featured Game</h3>
         <img class="featuredGame" src="images/ApexLegends.png">
    </div> </a>

    @guest
    <div class="yourGroups">
        <h3>Your Groups</h3>
        <div class=ftdGrp>
            <p>Please login or register to see your groups</p>
        </div>
    </div>
    @else
    <div class="yourGroups">
    <h3>Your Groups</h3>
        <div class=ftdGrp>
            <h4>Bioshock Speed Run</h4>
            <p>Top Score: 30min 2s</p>
            <p>Player: XXxxjonnyxxXX</p>
        </div>
        <div class=ftdGrp>
            <h4>PUBG Chicken Dinners</h4>
            <p>Top Score: 100</p>
            <p>Player: pbandj</p>
        </div>
    </div>
    @endif

</div>
@endsection
