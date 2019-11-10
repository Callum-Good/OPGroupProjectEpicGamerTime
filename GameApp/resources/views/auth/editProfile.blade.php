@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit your profile</h3>
    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name">Your username</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : auth()->user()->name }}" placeholder="Enter Title">
            @if($errors->has('name')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('name')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="email">Your email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ? : auth()->user()->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row">
            <label for="favorite_game">Your favorite game</label>
            <input name="favorite_game" id="favorite_game" rows="4" class="form-control {{ $errors->has('favorite_game') ? 'is-invalid' : '' }}" placeholder="Enter your favorite game" value="{{ old('favorite_game') ? : auth()->user()->favorite_game }}">
            @if($errors->has('favorite_game')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('favorite_game')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="bio">Your bio</label>
            <textarea name="bio" id="bio" rows="4" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}" placeholder="Talk about yourself!">{{ old('bio') ? : auth()->user()->bio }}</textarea>
            @if($errors->has('bio')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('bio')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Update profile picture</label>
            <div class="col-md-6">
                <input id="profile_image" type="file" class="form-control file" name="profile_image">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endsection