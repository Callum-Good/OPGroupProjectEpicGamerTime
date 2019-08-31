@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Game</h3>
    <form action="{{route('games.update',$game->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Game Title</label>
            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ? : $game->title }}" placeholder="Enter Title">
            @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Game Description</label>
            <textarea name="body" id="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Enter Game Description">{{ old('body') ? : $game->body }}</textarea>
            @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('body')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- year of release -->
        <div class="form-group">
            <label for="release">Released</label>
            <input type="date" name="release" id="release" class="form-control {{$errors->has('release') ? 'is-invalid' : '' }}" value="{{old('release') ? : $game->release }}" placeholder="Enter Year of Release">
            @if($errors->has('release')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('release')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- genre of game -->
        <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-control {{$errors->has('genre') ? 'is-invalid' : '' }}" value="{{old('genre') ? : $game->genre }}" placeholder="Enter Genre">
                    @if($errors->has('genre')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('genre')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
<!-- perspective -->
        <div class="form-group">
                    <label for="playstyle">Perspective</label>
                    <input type="text" name="perspective" id="perspective" class="form-control {{$errors->has('perspective') ? 'is-invalid' : '' }}" value="{{old('perspective') ? : $game->perspective }}" placeholder="Enter Perspective e.g. FPS, Third Person..">
                    @if($errors->has('perspective')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('perspective')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
<!-- platform -->
        <div class="form-group">
                    <label for="platform">Platform</label>
                    <input type="text" name="platform" id="platform" class="form-control {{$errors->has('platform') ? 'is-invalid' : '' }}" value="{{old('platform') ? : $game->platform }}" placeholder="Enter Platform e.g. XBox One..">
                    @if($errors->has('platform')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('platform')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection