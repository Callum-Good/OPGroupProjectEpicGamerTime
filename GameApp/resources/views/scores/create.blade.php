@extends('layouts.app')
@section('content')
    <h2 class="text-center">Add score</h2>
    <form action="{{route('scores.store')}}" method="post" class="gameForm" enctype="multipart/form-data">
        @csrf
<!-- title of game -->
        <div class="form-group">
            <label for="title">Highscore</label>
            <input type="text" name="score" id="highscore" class="form-control {{$errors->has('score') ? 'is-invalid' : '' }}" value="{{old('score')}}" placeholder="Enter you score">
            @if($errors->has('score')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('score')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection