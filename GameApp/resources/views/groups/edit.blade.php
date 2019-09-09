@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Group</h3>
    <form action="{{route('groups.update',$group->id)}}" method="post" class="gameForm">
        @csrf
        @method('PUT')
        <!-- Group Name -->
        <div class="form-group">
            <label for="title">Group name</label>
            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ? : $group->name }}" placeholder="Enter Name">
            @if($errors->has('name')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('name')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <!-- game -->
        <div class="form-group">
                    <label for="game">Game</label>
                    <input type="text" name="game" id="game" class="form-control {{$errors->has('game') ? 'is-invalid' : '' }}" value="{{old('game') ? : $group->game }}" placeholder="Enter Games...">
                    @if($errors->has('game')) {{-- <-check if we have a validation error --}}
                        <span class="invalid-feedback">
                            {{$errors->first('game')}} {{-- <- Display the First validation error --}}
                        </span>
                    @endif
                </div>
        <!-- type of group -->
        <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control {{$errors->has('type') ? 'is-invalid' : '' }}" value="{{old('type') ? : $group->type }}" placeholder="Enter Group Type">
                    @if($errors->has('genre')) {{-- <-check if we have a validation error --}}
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


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection