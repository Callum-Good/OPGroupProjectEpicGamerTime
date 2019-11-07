@extends('layouts.app')
@section('content')

<div class="container">

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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profileWrapper">
                <div class="profile">
                    @if (auth()->user()->image)
                        <img src="{{ asset(auth()->user()->image) }}">
                    @else
                        <img id="dp" src="{{ asset('images/default.jpg') }}">
                    @endif
                    <h1>{{ Auth::user()->name }}</h2>
                    <h2>Favorite Game:</h2>
                    @if (auth()->user()->favorite_game)
                        <p><a href="">{{ Auth::user()->favorite_game }}</a></p>
                    @else
                        <p><i>No favorite game</i></p>
                    @endif
                </div>

                <div class="bio">
                    <h2>{{ Auth::user()->name }}'s Bio</h2>
                    @if (auth()->user()->bio)
                        <p>{{ Auth::user()->bio }}</p>
                    @else
                        <p><i>{{ Auth::user()->name }} has not created a bio. How boring!</i></p>
                    @endif
                </div>
        
                <div class="update">
                    <a href="{{ route('editProfile') }}" class="btn btn-primary updateProfileBtn">Update Your Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
    @if($yourGroups == 0)
    <div class="yourGroupsProfileWrapper">
            <div class="yourGroupsProfile">
                <h3>Your Groups</h3>
                    <div class="ftdGrp ftdGrpProfile"  style= "height:100px">
                    <h4>You aren't in any groups</h4>
                    <h4>When you join a group they will appear here</h4>                     
                    <br>
                </div>
               
            </div>
        </div>
    @else
        <div class="yourGroupsProfileWrapper">
            <div class="yourGroupsProfile">
                <h3>Your Groups</h3>

                @foreach($yourGroups as $g)
                <a href="{{route('groups.show',$g->id)}}">
                    <div class="ftdGrp ftdGrpProfile"  style= "height:100px">
                    <h4>{{$g->name}}</h4>
                    <img src="{{asset($g->grp_image)}}"  style= "height:60px">
                    
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