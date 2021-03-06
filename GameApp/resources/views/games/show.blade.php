@extends('layouts.app')
@section('content')
<h2 class="text-center">{{$game->title}}</h2>

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
        <h2 class="groupText">Release date:</h2><br><br>
        <p>{{$game->release}}
        </p>
        <hr>
        <h2 class="groupText">Genre:</h2><br><br>
        <p>{{$game->genre}}
        </p>
        <hr>
        <h2 class="groupText">Description:</h2><br><br>
        <p>{{$game->description}}
        </p>
        <hr>
        <h2 class="groupText">Perspective:</h2><br><br>
        <p>{{$game->perspective}}
        </p>
        <hr>
        <h2 class="groupText">Platform:</h2><br><br>
        <p>{{$game->platform}}
        </p>
        <hr>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset($game->game_art)}}" style="display:block; margin-left: auto; margin-right: auto; width:100%; height:100%">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br>
                @guest
                @else
                <a href="{{route('games.edit',$game->id)}}" class="btn-success btn-block groupbtns btn-text">Update</a>
                @if($scoreArray != 0)
                <!-- shows nothing -->
                @else
                 <!-- Shows game delete button -->
                <a href="#" class="btn-danger btn-success btn-block groupbtns btn-text" data-toggle="modal" data-target="#delete-modal">Delete</a>
                @endif
                @endif
                <div class="clearfix"></div><br>

                <div class="modal fade" id="delete-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Game</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-description">
                                <br>
                                <h3 align="middle">Are you sure?</h3>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" id="delete-form" class="deleteF" action="{{route('games.destroy',$game->id)}}" class="hide">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-centered">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Highscore
                                </th>
                                <th>
                                    Score Verification
                                </th>
                            </tr>
                        </thead>
                        @if($scoreArray == 0)
                        <!-- shows nothing -->
                        @else
                        <!-- Shows all member things -->
                        @if($scoreArray == 0)
                        @else
                        @foreach($scoreArray as $score)
                        @guest
                        @elseif(Auth::user()->id == $score['user_id'])
                        @php
                        $hasScore = true
                        @endphp
                        @endif
                        @endforeach
                        @endif
                        @foreach($scoreArray as $score)
                        <tbody>
                            @if ((Auth::check()) && ($score['user_id'] == Auth::user()->id))
                            <tr>
                                <td>
                                    <a href="{{route('profile')}}">
                                        {{$score['name']}}</a>
                                </td>
                                <td>
                                    {{$score['score']}}
                                </td>
                                <td>
                                    <img src="{{asset($score['score_verification_image'])}}" style="margin: 0 auto; width: 30%;">
                                </td>
                            </tr>
                            @elseif ($score['votes_to_ban'] < 2)
                            <tr>
                                <td>
                                    <a href="{{route('users.show',$score['user_id'])}}">
                                        {{$score['name']}}</a>
                                </td>
                                <td>
                                    {{$score['score']}}
                                </td>
                                <td>
                                    <img src="{{asset($score['score_verification_image'])}}" style="margin: 0 auto; width: 30%;">
                                </td>
                            </tr>
                            @endif
                        </tbody>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            @guest
            @else
            @if($hasScore==true)
            <form class="form-inline deleteF" action="{{route('AddScoreToGamesController.deleteScore')}}" method="POST">
                {{csrf_field()}}
                <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
                <!--Sends to next page-->
                <input type='hidden' name='game_id' value='{{$game->id}}'>
                <!--Sends to next page-->
                <input type='submit' name='submit' value='Delete highscore' class="btn btn-success btn-block btn-text">
        </div>
        <br>
        </form>
        @else
        <form class="form-group deleteF" action="{{route('AddScoreToGamesController.addScore')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div>
                <input type="text" name="score" id="title" class="form-control inputGame" value="{{old('score')}}" placeholder="Enter Highscore"><br>

                <p>Please upload an image in order to verify your score: </p>
                <input id="score_verification_image" type="file" class="form-control file" enctype="multipart/form-data" name="score_verification_image"><br>
                <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
                <!--Sends to next page-->
                <input type='hidden' name='game_id' value='{{$game->id}}'>
                <!--Sends to next page-->
                <input type='submit' class="btn btn-success btn-block btn-text" name='submit' value='Add new highscore'>
            </div>
            <br>
        </form>
        @endif
        @endif
        <br><br>
    </div>
</div>
@endsection