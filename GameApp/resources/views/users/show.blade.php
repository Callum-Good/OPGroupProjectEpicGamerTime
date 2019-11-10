@extends('layouts.app')
@section('content')

<div class="container">


    <div class="row justify-content-center">
    
        <div class="col-md-8">
            <div class="profileWrapper">
                <div class="profile">
                    @if ($user->image)
                        <img alt="profile picture" src="{{ asset($user->image) }}">
                    @else
                        <img id="dp" alt="default profile picture" src="{{ asset('images/default.jpg') }}">
                    @endif
                    <h1>{{ $user->name }}</h2>
                    <h2>Favorite Game:</h2>
                    @if ($user->favorite_game)
                        <p><a href="">{{ $user->favorite_game }}</a></p>
                    @else
                        <p><i>No favorite game</i></p>
                    @endif
                </div>

                <div class="bio">
                    <h2>{{ $user->name }}'s Bio</h2>
                    
                    @if ($user->bio)
                        <p>{{ $user->bio }}</p>
                    @else
                        <p><i>{{ $user->name }} has not created a bio. How boring!</i></p>
                    @endif

                    @if ((Auth::check()) && ((Auth::user()->id != $user->voter_1) && (Auth::user()->id != $user->voter_2)))
                        <a href="{{route('VoteToBan',$user->id)}}" type="submit" class="btn btn-primary updateProfileBtn">Vote to ban</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
        @if($yourGroups == 0)
        <div class="yourGroupsProfileWrapper">
            <div class="yourGroupsProfile">
                <h3>{{$user->name}}'s Groups</h3>
                    <div class="ftdGrp ftdGrpProfile"  style= "height:100px">
                    <h4>{{$user->name}}'s currently doesn't belong to any groups</h4>                   
                    <br>
                </div>
               
            </div>
        </div>
    @else
        <div class="yourGroupsProfileWrapper">
            <div class="yourGroupsProfile">
                <h3>{{$user->name}}'s Groups</h3>

                @foreach($yourGroups as $g)
                <a href="{{route('groups.show',$g->id)}}">
                    <div class="ftdGrp ftdGrpProfile"  style= "height:100px">
                    <h4>{{$g->name}}</h4>
                    <img alt="image of group user belongs to" src="{{asset($g->grp_image)}}"  style= "height:60px">
                    
                    <br>
                </div></a>
                @endforeach
            </div>
        </div>
    @endif
    </div>
    </div>

   
    
</div>
@endsection