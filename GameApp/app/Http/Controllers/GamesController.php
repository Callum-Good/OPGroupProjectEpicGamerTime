<?php

namespace App\Http\Controllers;

use App\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the games with pagination.
        $games = Games::orderBy('created_at','desc')->paginate(8);

        //return a view with all the games.
        return view('games.index',[
            'games' => $games,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'title' => 'required|string|unique:games,title|min:2|max:191',
            'body'  => 'required|string|min:5|max:1000',
        ];

        //custom validation error messages
        $messages = [
            'title.unique' => 'Game title should be unique',
        ];

        //First Validate the form data
        $request->validate($rules,$messages);

        //Create a Game
        $game        = new Games;
        $game->title = $request->title;
        $game->body  = $request->body;
        $game->save(); // save it to the database.

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('games.index')
            ->with('status','Added a new game!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find a Game by it's ID
        $game = Games::findOrFail($id);

        return view('games.show',[
            'game' => $game,
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
        //Find a Game by it's ID
        $game = Games::findOrFail($id);

        return view('games.edit',[
            'game' => $game,
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
        //validation rules
        $rules = [
            'title' => "required|string|unique:games,title,{$id}|min:2|max:191",
            'body'  => 'required|string|min:5|max:1000',
        ];

        //custom validation error messages
        $messages = [
            'title.unique' => 'Game title should be unique',
        ];

        //First Validate the form data
        $request->validate($rules,$messages);

        //Update the Game
        $game        = Games::findOrFail($id);
        $game->title = $request->title;
        $game->body  = $request->body;
        $game->save(); //Can be used for both creating and updating

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('games.show',$id)
            ->with('status','Updated the selected game!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the Game
        $game = Games::findOrFail($id);
        $game->delete();

        // Game::destroy([id]) is also avaliable

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('games.index')
            ->with('status','Deleted the selected game!');
    }
}
