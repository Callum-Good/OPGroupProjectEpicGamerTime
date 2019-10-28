@extends('layouts.app')
@section('content')
    <h2 class="text-center">Users</h2>
    
        @if (session('bannedMessage'))
            <div class="alert alert-danger">{{ session('bannedMessage') }}</div>
        @endif
        <table>
        <tr>
            <th>@sortablelink('name') </th>
        </tr>

        @forelse($users as $user)

    <!--<li class="list-group-item my-2">-->
        @if (Auth::check()) && ($user->id == Auth::user()->id)
        <tr>
            <td><a class="gpLink" href="{{route('profile')}}">
                @if (Auth::user()->image)
                    <img src="{{ asset(Auth::user()->image) }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
                @else 
                    <img src="{{ asset('images/default.jpg') }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
                @endif 
            {{Auth::user()->name}}</a></td>                
        </tr>
        @else
        <tr>
            <td><a class="gpLink" href="{{route('users.show',$user->id)}}">
                @if ($user->image)
                    <img src="{{ asset($user->image) }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
                @else 
                    <img src="{{ asset('images/default.jpg') }}" style="width: 100px; height: 100px; border-radius: 20%;"> 
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
        {{$users->links('vendor.pagination.bootstrap-4')}} {{-- <- custom pagination view --}}
    </div>
@endsection