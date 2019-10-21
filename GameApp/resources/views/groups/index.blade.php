@extends('layouts.app')
@section('content')
    <h2 class="text-center">Groups</h2>

    <p class="gInfo">@sortablelink('name') | @sortablelink('game_id') | 
    @sortablelink('type') | @sortablelink('description')</p>

    <div class="tableRow">
                @forelse($groups as $group)

            <!--<li class="list-group-item my-2">-->
            <a class="gpLink" href="{{route('groups.show',$group->id)}}">
    <div class="card" style="width: 45%;
    float: left; display: flow-root;">
    <div class="imgCen" style="width:160px;
    padding:5px;
    float: left;
    margin-right:10px;">
    <img class="card-img-top" src="{{asset($group->grp_image)}}" alt="Card image cap" style="height:150px; width:150px;">
    </div>
    <div class="card-body">
      <h3 >{{$group->name}}</h3>
      <p class="gInfo">{{$group->type}} | {{$group->game_id}} </p>
      <ul>
    <li class="tableListItem">{{str_limit($group->description,40)}}</li>
    </ul>     
</div>
    </div>
    </a>

            
 
            <!--</li>-->
        @empty
            <h4 class="text-center">No Groups Found!</h4>
        @endforelse
        </div>

    <div class="d-flex justify-content-center">
        {{$groups->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection
