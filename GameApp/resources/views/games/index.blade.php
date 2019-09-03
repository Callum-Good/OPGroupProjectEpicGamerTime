@extends('layouts.app')
@section('content')
    <style>
        .sortable {  cursor: pointer;}
        .st-sort-ascent i,.st-sort-descent i {  padding-left: 4px;}
        .st-sort-ascent i:before {  content: '\25B2';}
        .st-sort-descent i:before {  content: '\25BC';}
    </style>
    <h2 class="text-center">Games</h2>
   <!-- <ul class="list-group py-3 mb-3">-->
        <table st-table="data">
            <tr class="sortable">
                <th>@sortablelink('Title') </th>
                <th>@sortablelink('Description')</th>  
                <th>@sortablelink('Release')</th>
                <th>@sortablelink('Genre')</th>
                <th>@sortablelink('Perspective')</th>
                <th>@sortablelink('Platform')</th>
            </tr>

        @forelse($games as $game)

            <!--<li class="list-group-item my-2">-->

            <tr>
                    <td><a class="gpLink" href="{{route('games.show',$game->id)}}">{{$game->title}}</a></td>
                    <td><a class="gpLink" href="{{route('games.show',$game->id)}}">{{str_limit($game->description,20)}} </a></td>
                    <!--<small class="float-right">{{$game->created_at->diffForHumans()}}</small>-->
                    
                    <td><a class="gpLink" href="{{route('games.show',$game->id)}}">{{$game->release}}</a></td>
                    <td><a class="gpLink" href="{{route('games.show',$game->id)}}">{{$game->genre}}</a></td>
                    <td><a class="gpLink" href="{{route('games.show',$game->id)}}">{{$game->perspective}}</a></td>
                    <td><a class="gpLink" href="{{route('games.show',$game->id)}}">{{$game->platform}}</a></td>
                </tr>
 
            <!--</li>-->
        @empty
            <h4 class="text-center">No Games Found!</h4>
            </table>
        @endforelse
</table>

    <div class="d-flex justify-content-center">
        {{$games->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection