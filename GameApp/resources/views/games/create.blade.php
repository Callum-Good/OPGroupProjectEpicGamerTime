@extends('layouts.app')
@section('content')
    <h2 class="text-center">Create Game</h2>
    <form action="{{route('games.store')}}" method="post" class="gameForm">
        @csrf
<!-- title of game -->
        <div class="form-group">
            <label for="title">Game Title</label>
            <input type="text" name="title" id="title" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title')}}" placeholder="Enter Title">
            @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- description of game -->
        <div class="form-group">
            <label for="description">Game Description</label>
            <textarea name="description" id="description" rows="4" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Enter Game Description">{{old('description')}}</textarea>
            @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('description')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- year of release -->
        <div class="form-group">
            <label for="release">Released</label>
            <input type="date" name="release" id="release" class="form-control {{$errors->has('release') ? 'is-invalid' : '' }}" value="{{old('release')}}" placeholder="Enter Year of Release">
            @if($errors->has('release')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('release')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- genre of game -->
        <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-control {{$errors->has('genre') ? 'is-invalid' : '' }}" value="{{old('genre')}}" placeholder="Enter Genre">
                    @if($errors->has('genre')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('genre')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
<!-- perspective -->
        <div class="form-group">
                    <label for="perspective">Perspective</label>
                    <input type="text" name="perspective" id="perspective" class="form-control {{$errors->has('perspective') ? 'is-invalid' : '' }}" value="{{old('perspective')}}" placeholder="Enter Perspective e.g. FPS, Third Person..">
                    @if($errors->has('perspective')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('perspective')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
<!-- platform -->
        <div class="form-group">
                    <label for="platform">Platform</label>
                    <input type="text" name="platform" id="platform" class="form-control {{$errors->has('platform') ? 'is-invalid' : '' }}" value="{{old('platform')}}" placeholder="Enter Platform e.g. XBox One..">
                    @if($errors->has('platform')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('platform')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection