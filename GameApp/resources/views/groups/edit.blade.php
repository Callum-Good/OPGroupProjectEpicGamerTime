@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Group</h3>
    <!--
    Checking for any errors
    -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('groups.update',$group->id)}}" method="post" class="gameForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Group Name -->
        <div class="form-group">
            <label for="name">Group name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : $group->name }}" placeholder="Enter Name">
            @if($errors->has('name')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('name')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <!-- game -->
        <div class="form-group">
                    <label for="game_id">Game</label>
                    <input type="text" name="game_id" id="game_id" class="form-control {{$errors->has('game_id') ? 'is-invalid' : '' }}" value="{{old('game_id') ? : $group->game_id }}" placeholder="Enter Games...">
                    @if($errors->has('game_id')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('game_id')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <!-- type of group -->
        <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control {{$errors->has('type') ? 'is-invalid' : '' }}" value="{{old('type') ? : $group->type }}" placeholder="Enter Group Type">
                    @if($errors->has('type')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('type')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <!-- description -->        
        <div class="form-group">
            <label for="description">Group Description</label>
            <textarea name="description" id="description" rows="4" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Enter Group Description">{{ old('description') ? : $group->description }}</textarea>
            @if($errors->has('description')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('description')}} {{-- <- Display the First validation error --}}
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

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection