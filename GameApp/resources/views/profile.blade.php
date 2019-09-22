@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profilePic">
                <img src="images/defaultPic.jpg">
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->favoriteGame }}</p>
            </div>

            <div class="bio">
                <p>{{ Auth::user()->bio }}</p>
            </div>

            <div class="groups">
            </div>
		</div>
    </div>
</div>
@endsection