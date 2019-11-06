<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;
use App\Games;
use App\Score;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games = Games::all();

        //Find random game to be featured each time page is loaded
        $game_ids = $games->pluck('id')->all();
        $max = count($game_ids);
        $randIndex = array_rand($game_ids);
        $randomId = $game_ids[$randIndex];
        $featuredGame = Games::findOrFail($randomId);
        
        //Scores from highest to lowest
        $top = Score::orderby('score', 'DESC')->get();
        $scoreArray = null;

        //add each score to array
        foreach($top as $score)
        {            
            $user = User::findOrFail($score->user_id);
            $game = Games::findorfail($score->game_id); 
            
            $scoreArray[] = ['name'=> $user->name, 'score' => $score->score, 
            'game' => $game->title, 'gameImage' => $game->game_art, 'user_id' => $user->id, 'game_id' => $game->id];
        
        }

        //grabing just the top 5 scores to send to homepage
        $top5[] = null;
        for($i=0;$i<5;$i++){
            if($scoreArray[$i] != 0){
                $top5[$i] = $scoreArray[$i];
            }
        }
       
        return view('home', compact('featuredGame', 'top5'));
    }
}
