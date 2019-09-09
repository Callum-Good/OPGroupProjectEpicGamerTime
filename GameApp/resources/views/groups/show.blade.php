@extends('layouts.app')
@section('content')
    <h2 class="text-center">{{$group->title}}</h2>
    
        <p class="gInfo">Created {{$group->type}} | {{$group->game_id}} | </p>
    
    <p>{{$group->description}}</p>
    
    <br>
    <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>


@endsection