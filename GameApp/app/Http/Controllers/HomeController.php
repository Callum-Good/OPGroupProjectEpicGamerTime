<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;
use App\Games;

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
        
        //High Scores


        //$groups = Games::
        return view('home', compact('featuredGame'));
    }
}
