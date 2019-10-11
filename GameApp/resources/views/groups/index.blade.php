@extends('layouts.app')
@section('content')
    <h2 class="text-center">Groups</h2>
                <table>
                <tr>
                    <th>@sortablelink('name') </th>
                    <th>@sortablelink('game_id') </th>

                    <th>@sortablelink('type')</th>
                    <th>@sortablelink('description')</th>
                </tr>

                @forelse($groups as $group)

            <!--<li class="list-group-item my-2">-->

            <tr>
                    <td><a class="gpLink" href="{{route('groups.show',$group->id)}}">{{$group->name}}</a></td>
                    <td><a class="gpLink" href="{{route('groups.show',$group->id)}}">{{$group->game_id}}</a></td>

                    <td><a class="gpLink" href="{{route('groups.show',$group->id)}}">{{str_limit($group->description,20)}} </a></td>
                    
                    <td><a class="gpLink" href="{{route('groups.show',$group->id)}}">{{$group->type}}</a></td>
                    <img src="{{$group->grp_image}}"></a></td>

                </tr>
 
            <!--</li>-->
        @empty
            <h4 class="text-center">No Groups Found!</h4>
            </table>
        @endforelse
</table>

    <div class="d-flex justify-content-center">
        {{$groups->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection
