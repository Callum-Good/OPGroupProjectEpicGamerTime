@extends('layouts.app')
@section('content')
    <h2 class="text-center">Users</h2>
                <table>
                <tr>
                    <th>@sortablelink('id') </th>
                    <th>@sortablelink('name') </th>
                </tr>

                @forelse($users as $user)

            <!--<li class="list-group-item my-2">-->

                <tr>
                    <td><a class="gpLink" href="{{route('users.show',$user->id)}}">{{$user->id}}</a></td>
                    <td><a class="gpLink" href="{{route('users.show',$user->id)}}">{{$user->name}}</a></td>                
                </tr>
 
            <!--</li>-->
        @empty
            <h4 class="text-center">No Users Found!</h4>
            </table>
        @endforelse
</table>

    <div class="d-flex justify-content-center">
        {{$users->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection