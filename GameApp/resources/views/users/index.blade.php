@extends('layouts.app')
@section('content')
    <h2 class="text-center">Users</h2>
        <table>
        <tr>
            <th>@sortablelink('name') </th>
        </tr>

        @forelse($users as $user)

    <!--<li class="list-group-item my-2">-->
    @if ((Auth::check()) && ($user->id == Auth::user()->id))
    <tr>
        <td><a class="gpLink" href="{{route('profile')}}">
            @if (Auth::user()->image)
                <img alt="profile picture" src="{{ asset(Auth::user()->image) }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
            @else 
                <img alt="profile picture" src="{{ asset('images/default.jpg') }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
            @endif 
        {{Auth::user()->name}}</a></td>                
    </tr>
    @elseif ($user->votes_to_ban < 2)
    <tr>
        <td><a class="gpLink" href="{{route('users.show',$user->id)}}">
            @if ($user->image)
                <img alt="profile picture" src="{{ asset($user->image) }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
            @else 
                <img alt="profile picture" src="{{ asset('images/default.jpg') }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
            @endif 
        {{$user->name}}</a></td>          
    </tr>
    @endif

    <!--</li>-->
    @empty
        <h4 class="text-center">No Users Found!</h4>
        </table>
    @endforelse
</table>

    <div class="d-flex justify-content-center">
        {{$users->appends(Request::all())->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection