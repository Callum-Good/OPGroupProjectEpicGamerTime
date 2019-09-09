@extends('layouts.app')
@section('content')
    <h2 class="text-center">Create Group</h2>
    <form action="{{route('groups.store')}}" method="post" class="gameForm">
        @csrf
<!-- name of group -->
        <div class="form-group">
            <label for="name">Group Name</label>
            <input type="text" name="name" id="name" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title')}}" placeholder="Enter Name of Group">
            @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Enter Group Description">{{old('description')}}</textarea>
            @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('description')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- type of group -->
        <div class="form-group">
            <label for="release">Type of group</label>
            <input type="text" name="release" id="release" class="form-control {{$errors->has('release') ? 'is-invalid' : '' }}" value="{{old('release')}}" placeholder="">
            @if($errors->has('release')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('release')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- game -->
        <div class="form-group">
                    <label for="genre">Favourite Game</label>
                    <input type="text" name="genre" id="genre" class="form-control {{$errors->has('genre') ? 'is-invalid' : '' }}" value="{{old('genre')}}" placeholder="Favourite Games">
                    @if($errors->has('genre')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('genre')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection