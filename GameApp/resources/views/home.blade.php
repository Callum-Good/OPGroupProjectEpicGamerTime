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
<!--<img src="images/twoGamers.jpg">-->
    @guest
    <a href="{{ route('login') }}"><h3>Login</h3></a>
    <a href="{{ route('register') }}"><h3>Register</h3></a>
    <a href="{{ route('games.index') }}"><h3>Browse Games</h3>
    <a href=""><h3>Browse Groups</h3>
    @else
    <a href="{{ route('games.index') }}"><h3>Browse Games</h3>
    <a href=""><h3>Browse Groups</h3>
    @endif
</div>
@endsection
