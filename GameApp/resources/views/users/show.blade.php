@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profileWrapper">
                <div class="profile">
                    @if (user()->image)
                        <img src="{{ asset(user()->image) }}">
                    @else
                        <img id="dp" src="images/default.jpg">
                    @endif
                    <h1>{{ user()->name }}</h2>
                    <h2>Favorite Game:</h2>
                    @if (user()->favorite_game)
                        <p><a href="">{{ user()->favorite_game }}</a></p>
                    @else
                        <p><i>No favorite game</i></p>
                    @endif
                </div>

                <div class="bio">
                    <h2>{{ user()->name }}'s Bio</h2>
                    @if (user()->bio)
                        <p>{{ user()->bio }}</p>
                    @else
                        <p><i>{{ user()->name }} has not created a bio. How boring!</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="yourGroupsProfileWrapper">
        <div class="yourGroupsProfile">
            <a href=""><h3>Your Groups</h3></a>
            <a href=""><div class="ftdGrpProfile">
                <img src="images/bioshock.jpg">
                <h4>Bioshock Speed Run</h4>
                <br>
                <p>Top Score: 30min 2s</p>
                <p>Player: XXxxjonnyxxXX</p>
            </div></a>
            <a href=""><div class="ftdGrpProfile">
            <img src="images/pubg.jpg">
                <h4>PUBG Chicken Dinners</h4>
                <p>Top Score: 100</p>
                <p>Player: pbandj</p>
            </div></a>
            <a href=""><div class="ftdGrpProfile">
            <img src="images/minecraft.jpg">
                <h4>Minecraft Gold Digger</h4>
                <br>
                <p>Top Score: 20,000 Blocks</p>
                <p>Player: mineCraftHero</p>
            </div></a>
            <a href=""><div class="ftdGrpProfile">
            <img src="images/farmingSim.jpg">
                <h4>Farming Sim Cow Tipper</h4>
                <br>
                <p>Top Score: 7</p>
                <p>Player: jstdatip</p>
            </div></a>
            <a href=""><div class="ftdGrpProfile lastProfile">
                <img src="images/halo5.jpg">
                <h4>Halo 5 Legendary Speed</h4>
                <p>Top Score: 1h 20mins</p>
                <p>Player: cheif117</p>
            </div></a>
        </div>
    </div>
</div>
@endsection