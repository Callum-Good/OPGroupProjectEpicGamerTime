@extends('layouts.app')
@section('content')
    <h2 class="text-center">{{$group->name}}</h2>

        <p class="gInfo">{{$group->type}} | {{$group->game_id}} </p>
    <div class="grpimgFeature">
        <img src="{{$group->grp_image}}">
    </div>
  
    <!-- Shows each member in Group -->
    @foreach($memberArray as $member)
    <a href="{{route('users.show',$member->id)}}">{{$member->name}}</a>
    @endforeach

    <!-- Checks to see if logged in user is currently in group -->
    @foreach($memberArray as $member)
        @if(Auth::user()->id == $member->id)
        @php 
        $joined = true    
        @endphp  
        @endif      
    @endforeach  

    <p>{{$group->description}}</p>
    
    <br>
    <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>
    @guest
        <!-- doesnt show join button if no one is logged in -->
        @else 
            @if($joined==true)<!-- Checks to see if user in group, changes join button to leave -->
                <div class="joinGroup">
                <form method="POST" id="delete-form" class="deleteF" action="{{route('AddUsersToGroup.leaveGroup')}}">
                @csrf
                <input type='submit' name='submit' value='Leave Group'>
                <input type = 'hidden' name='user_id' value='{{Auth::user()->id}}'> <!--Sends to next page-->
                <input type = 'hidden' name='group_id' value='{{$group->id}}'> <!--Sends to next page-->
                </form>
                </div>
            @else<!-- shows join button when logged in -->
                <div class="joinGroup">
                <form method="POST" id="delete-form" class="deleteF" action="{{route('AddUsersToGroup.joinGroup')}}">
                @csrf
                <input type='submit' name='submit' value='Join Group'>
                <input type = 'hidden' name='user_id' value='{{Auth::user()->id}}'> <!--Sends to next page-->
                <input type = 'hidden' name='group_id' value='{{$group->id}}'> <!--Sends to next page-->
                </form>
                </div>
            @endif
    @endif

  
       
    <br><br>

 <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
              
                 
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-description">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" class="deleteF" action="{{route('groups.destroy',$group->id)}}" class="hide">
        @csrf
        @method('DELETE')
    </form>

@endsection