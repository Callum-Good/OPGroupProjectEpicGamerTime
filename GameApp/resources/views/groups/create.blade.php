@extends('layouts.app')
@section('content')
    <h2 class="text-center">Create Group</h2>
    <form action="{{route('groups.store')}}" method="post" class="gameForm" enctype="multipart/form-data">
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
            <label for="type">Type of group</label>
            <input type="text" name="type" id="type" class="form-control {{$errors->has('type') ? 'is-invalid' : '' }}" value="{{old('type')}}" placeholder="">
            @if($errors->has('type')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('type')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
<!-- game -->
        <div class="form-group">
                    <label for="game_id">Favourite Game</label>
                    <input type="text" name="game_id" id="game_id" class="form-control {{$errors->has('game_id') ? 'is-invalid' : '' }}" value="{{old('game_id')}}" placeholder="Favourite Games">
                    @if($errors->has('game_id')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('game_id')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>

<!-- Game image -->
<div class="form-group row">
            <label for="grp_image" class="col-md-4 col-form-label text-md-right">Group Image</label>
            <div class="col-md-6">
                <input id="grp_image" type="file" class="form-control file" name="grp_image">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection