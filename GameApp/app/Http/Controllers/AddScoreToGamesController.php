<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use App\Games;
use App\User;
use App\Score;


class AddScoreToGamesController extends Controller
{
    public function addScore(Request $request)
    {

        $formData = request()->all();

        $request->validate([
            'score'=>'required|numeric|max:99999999'
        ]);

        $game_id = $formData['game_id'];
        $user_id = $formData['user_id'];
        $highscore = $formData['score'];

        $score = New Score;
        
        $score->user_id = $user_id;
        $score->game_id = $game_id;
        $score->score = $highscore;

        $score->save();


        session()->flash('alert-success', "Score was successfully created!");
        return redirect()
            ->route('games.show',$game_id)
            ->with('status','Added new highscore to game.');
    }

    public function deleteScore()
    {
        $formData = request()->all();

        $gid = $formData['game_id'];
        $uid = $formData['user_id'];
    
        $hasScore = Score::where([
            ['game_id',$gid],
            ['user_id', $uid]
            ])->get();
    
           
        $score = Score::findOrFail($hasScore);
        foreach($score as $s){
            $uGid = $s->id;
        }
       
        Score::where('id', $uGid)->delete();
            
        session()->flash('alert-success', "Score was successfully deleted.");
        return redirect()
            ->route('games.show',$gid)
            ->with('status','Deleted highscore.');

    }
}
