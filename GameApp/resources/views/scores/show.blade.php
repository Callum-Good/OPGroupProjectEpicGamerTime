@extends('layouts.app')
@section('content')

<h2 class="text-center">{{$scoreArray['name']}}'s Highscore</h2>

@if($scoreArray == 0)
    @else 
    @foreach($scoreArray as $score)
        @guest
        @elseif(Auth::user()->id == $score['user_id']) 
        @php 
        $hasScore = true    
        @endphp  
        @endif      
    @endforeach  
    @endif
@guest
@else
@if($hasScore==true)
<form class="form-inline" action="{{route('AddScoreToGamesController.deleteScore')}}" method="POST">
    {{csrf_field()}}
    <input type='hidden' name='user_id' value='{{Auth::user()->id}}'>
    <!--Sends to next page-->
    <input type='hidden' name='game_id' value="{{($scoreArray['game_id'])}}">
    <!--Sends to next page-->
    <input type='submit' name='submit' value='Delete highscore' class="btn btn-success btn-block btn-text">
    </div>
    <br>
</form>
 @endif
@endif
@endsection