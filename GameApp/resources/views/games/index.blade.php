@extends('layouts.app')
@section('content')
    <h2 class="text-center">My Games</h2>
    <ul class="list-group py-3 mb-3">
        @forelse($games as $game)
            <li class="list-group-item my-2">
                <h5>{{$game->title}}</h5>
                <p>{{str_limit($game->body,20)}}</p>
                <small class="float-right">{{$game->created_at->diffForHumans()}}</small>
                <a href="{{route('games.show',$game->id)}}">Read More</a>
            </li>
        @empty
            <h4 class="text-center">No Games Found!</h4>
        @endforelse
    </ul>

    <div class="d-flex justify-content-center">
        {{$games->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection