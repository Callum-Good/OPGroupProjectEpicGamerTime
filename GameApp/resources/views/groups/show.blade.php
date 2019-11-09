@extends('layouts.app')
@section('content')
<!--<h2 class="text-center">{{$group->name}}</h2>

        <p class="gInfo">{{$group->type}} | {{$group->game_id}} </p>
    <div class="grpimgFeature">
        <img src="{{asset($group->grp_image)}}">
    </div>
  
    <!-- checking if anyone in group -->
@if($memberArray == 0)
<!-- shows nothing -->
@else
<!-- Shows all member things -->
<!-- Shows each member in Group -->

<!-- Checks to see if logged in user is currently in group -->
@foreach($memberArray as $member)
@guest
<!-- Does nothing if no one logged in -->
@elseif(Auth::user()->id == $member->id)
<!-- if is in group set joined to true -->
@php
$joined = true
@endphp
@endif
@endforeach
@endif
<!-- End of member checks -->
<!--
    <p>{{$group->description}}</p>
    
    <br>
    <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2>
                {{$group->name}}
            </h2>

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

            <div class="row">

                <div class="col-md-8 groupDescription">
                    <p>
                        Group Game:<br></p>
                    <h2 class="groupText">{{$group->game_id}}</h2><br><br><br>
                    <p>Group type:<br></p>
                    <h2 class="groupText">{{$group->type}}</h2><br><br>
                    <hr>
                    <h2 class="groupText">Description:</h2><br><br>
                    <p>{{$group->description}}
                    </p>
                    <hr>
                    <div>
                        <h2 class="groupText">Members:</h2><br><br><br>
                        @if($memberArray == 0)
                        <!-- shows nothing -->
                        @else
                        <!-- Shows all member things -->
                        <!-- Shows each member in Group -->
                        <ul>
                            @foreach($memberArray as $member)

                            <li><a href="{{route('users.show',$member->id)}}">{{$member->name}}</a></li>

                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset($group->grp_image)}}" style="display:block; margin-left: auto; margin-right: auto; width:100%; height:100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @guest
                            <!-- doesnt show join button if no one is logged in -->
                            @else
                            <a href="{{route('groups.edit',$group->id)}}" class="btn-success btn-block groupbtns btn-text">Update</a>
                            <br><br>

                            @if($joined==true)
                            <!-- Checks to see if user in group, changes join button to leave -->
                            <div class="joinGroup">
                                <form method="POST" id="delete-form" class="deleteF" action="{{route('AddUsersToGroup.leaveGroup')}}">
                                    @csrf
                                    <input type='submit' name='submit' value='Leave Group' class="btn btn-success btn-block btn-text">
                                    <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
                                    <!--Sends to next page-->
                                    <input type='hidden' name='group_id' value='{{$group->id}}'>
                                    <!--Sends to next page-->
                                </form>
                            </div>
                            @else
                            <!-- shows join button when logged in -->
                            <div class="joinGroup">
                                <form method="POST" id="delete-form" class="deleteF" action="{{route('AddUsersToGroup.joinGroup')}}">
                                    @csrf
                                    <input type='submit' name='submit' value='Join Group' class="btn btn-success btn-block btn-text">
                                    <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
                                    <!--Sends to next page-->
                                    <input type='hidden' name='group_id' value='{{$group->id}}'>
                                    <!--Sends to next page-->
                                </form>
                            </div>
                            @endif
                            @endif
                            <br><br>
                            @guest
                            <!-- doesnt show join button if no one is logged in -->
                            @else
                            <a href="#" class="btn-danger btn-success btn-block groupbtns btn-text" data-toggle="modal" data-target="#delete-modal">Delete</a>
                            <!--Delete button method-->
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
                            @endif
                            <!--Delete button method END-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection