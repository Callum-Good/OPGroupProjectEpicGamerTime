@extends('layouts.app')
@section('content')
    <h2 class="text-center">My Games</h2>
   <!-- <ul class="list-group py-3 mb-3">-->
                <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Temp(read more)</th>
                    <th>Release</th>
                    <th>Genre</th>
                    <th>Play Style</th>
                    <th>Platform</th>
                </tr>
        @forelse($games as $game)
            <!--<li class="list-group-item my-2">-->

                <tr>
                    <td>{{$game->title}}</td>
                    <td>{{str_limit($game->body,20)}}</td>
                    <!--<small class="float-right">{{$game->created_at->diffForHumans()}}</small>-->
                    <td><a href="{{route('games.show',$game->id)}}">Read More</a></td>
                    <td>{{$game->release}}</td>
                    <td>{{$game->genre}}</td>
                    <td>{{$game->playstyle}}</td>
                    <td>{{$game->platform}}</td>
                </tr>
                </table>
            <!--</li>-->
        @empty
            <h4 class="text-center">No Games Found!</h4>
        @endforelse
    </ul>

    <div class="d-flex justify-content-center">
        {{$games->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection