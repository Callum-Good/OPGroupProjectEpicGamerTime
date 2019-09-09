@extends('layouts.app')
@section('content')
    <h2 class="text-center">Create Group</h2>
    <form action="{{route('groups.store')}}" method="post" class="gameForm">
        @csrf
<!-- name of group -->
        <div class="form-group">
            <label for="title">Group Name</label>
            <input type="text" name="title" id="title" class="form-control {{$errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title')}}" placeholder="Enter Name">
            @if($errors->has('title')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('title')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- game -->
        <div class="form-group">
            <label for="description">Favourite game </label>
            <textarea name="description" id="description" rows="4" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="Enter Favourite Game">{{old('description')}}</textarea>
            @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('description')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- type of group -->
        <div class="form-group">
            <label for="release">Type of group</label>
            <input type="text" name="release" id="release" class="form-control {{$errors->has('release') ? 'is-invalid' : '' }}" value="{{old('release')}}" placeholder="Enter Year of Release">
            @if($errors->has('release')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('release')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- description of group  -->
        <div class="form-group">
                    <label for="genre">Description</label>
                    <input type="text" name="genre" id="genre" class="form-control {{$errors->has('genre') ? 'is-invalid' : '' }}" value="{{old('genre')}}" placeholder="Enter Description of Group">
                    @if($errors->has('genre')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('genre')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
<!-- Created at -->
        <div class="form-group">
                    <label for="perspective">Created at</label>
                    <input type="text" name="perspective" id="perspective" class="form-control {{$errors->has('perspective') ? 'is-invalid' : '' }}" value="{{old('perspective')}}" placeholder="">
                    @if($errors->has('perspective')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('perspective')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
<!-- Updated at -->
        <div class="form-group">
                    <label for="platform">Updated at</label>
                    <input type="text" name="platform" id="platform" class="form-control {{$errors->has('platform') ? 'is-invalid' : '' }}" value="{{old('platform')}}" placeholder="">
                    @if($errors->has('platform')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('platform')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection