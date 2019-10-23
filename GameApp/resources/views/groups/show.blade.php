@extends('layouts.app')
@section('content')
    <h2 class="text-center">{{$group->name}}</h2>

        <p class="gInfo">{{$group->type}} | {{$group->game_id}} </p>
    <div class="grpimgFeature">
        <img src="{{$group->grp_image}}">
    </div>
    <p>{{$group->description}}</p>
    
    <br>
    <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>

       <div class="joinGroup">
    <form method="POST" id="delete-form" class="deleteF" action="{{route('AddUsersToGroup.joinGroup')}}">
     
        @csrf
        <input type='submit' name='submit' value='Join Group'>
        <input type = 'hidden' name='user_id' value='{{Auth::user()->id}}'> <!--Sends picked role to next page-->
        <input type = 'hidden' name='group_id' value='{{$group->id}}'> <!--Sends picked role to next page-->

    </form>
 
        <!--<a href="{{route('AddUsersToGroup.joinGroup', Auth::user()->id, $group->id)}}" class="btn btn-primary updateProfileBtn">Join Group</a>
    --></div>
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