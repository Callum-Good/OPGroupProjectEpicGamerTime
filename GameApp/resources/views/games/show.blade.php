@extends('layouts.app')
@section('content')
<h2 class="text-center">{{$game->title}}</h2>

<p class="gInfo">Released {{$game->release}} | {{$game->genre}} | {{$game->perspective}} | {{$game->platform}}</p>
<div class="imgFeature">
    <img src="{{$game->game_art}}">
</div>
<p>{{$game->description}}</p>

<br>
<a href="{{route('games.edit',$game->id)}}" class="btn btn-primary float-right">Update</a>
<br><br>

<a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
<div class="clearfix"></div><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Highscore
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            #
                        </td>
                        <td>
                            #
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form class="form-inline" action="/create" method="POST" role="create">
        {{csrf_field()}}
        <div>
            <a href="{{route('scores.create',$game->id)}}" class="btn btn-primary float-right">Add Highscore</a>
        </div>
        <br>
    </form>
    <br><br>
</div>

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
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<form method="POST" id="delete-form" class="deleteF" action="{{route('games.destroy',$game->id)}}" class="hide">
    @csrf
    @method('DELETE')
</form>


@endsection