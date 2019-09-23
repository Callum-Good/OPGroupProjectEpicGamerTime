@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit User</h3>
    <form action="{{route('users.update',$user->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : $user->name }}" placeholder="Enter Title">
            @if($errors->has('name')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('name')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="email">User E-Mail</label>
            <textarea name="email" id="email" rows="4" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter User Description">{{ old('email') ? : $user->email }}</textarea>
            @if($errors->has('email')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('email')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="bio">User Bio</label>
            <textarea name="bio" id="bio" rows="4" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" placeholder="Enter User Description">{{ old('bio') ? : $user->bio }}</textarea>
            @if($errors->has('bio')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('bio')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="favorite_game">User's favorite game</label>
            <textarea name="favorite_game" id="favorite_game" rows="4" class="form-control {{ $errors->has('favorite_game') ? 'is-invalid' : '' }}" placeholder="Enter User Description">{{ old('favorite_game') ? : $user->favorite_game }}</textarea>
            @if($errors->has('favorite_game')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('favorite_game')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection