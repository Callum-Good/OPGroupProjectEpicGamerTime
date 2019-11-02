<?php

namespace App\Http\Controllers;

use App\User;
use App\Games;
use App\Score;

use Illuminate\Http\Request;

class ScoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scores.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'score'=>'required'
        ]);

        $score = new Score;
        $score->score = $request->input('score');
        $score->game_id  = $request->game_id;
        $score->user_id  = $request->user_id;

        $score->save();

        return redirect()
            ->route('games.show')
            >with('status','Added new score');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score = Score::findOrFail($id);

        return view('scores.show',[
            'score' => $score
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $score = Score::findOrFail($id);

        return view('scores.edit',[
            'score' => $score,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'score'=>'required'
        ]);

        $score = Score::findOrFail($id);
        $score->score = $request->input('score');
        $score->game_id  = $request->game_id;
        $score->user_id  = $request->user_id;

        $score->save();

        return redirect()
            ->route('scores.show',$id)
            >with('status','Updated score');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
