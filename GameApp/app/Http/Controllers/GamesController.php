<?php

namespace App\Http\Controllers;

use App\Games;
use App\Score;
use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;




class GamesController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the games with pagination.
        // $games = Games::orderBy('created_at','desc')->paginate(8);

        $games = Games::sortable()->paginate(8);

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
        $request->validate([
            'title' => 'required|string|unique:games,title|min:2|max:191',
            'description'  => 'required|string|min:5|max:1000',
            'release' => 'required|date',
            'genre' => 'required|string',
            'perspective' => 'required|string',
            'platform' => 'required|string',
            'game_art' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        //custom validation error messages
        $messages = [
            'title.unique' => 'Game title should be unique',
        ];

        //First Validate the form data
        //$request->validate($rules,$messages);

        //Create a Game
        $game        = new Games;
        $game->title = $request->input('title');
        $game->description  = $request->input('description');
        $game->release = $request->input('release');
        $game->genre = $request->input('genre');
        $game->perspective = $request->input('perspective');
        $game->platform = $request->input('platform');
        

       
        // Check if a profile image has been uploaded
        if ($request->has('game_art')) {
            // Get image file
            $image = $request->file('game_art');
            // Make a image name based on game title and current timestamp
            $name = str_slug($request->input('title').'_'.time());
            // Define folder path
            $folder = '/uploads/gameImages/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $game->game_art = $filePath;
        }
        else{
            $game->game_art = '/images/gameDefault.jpg';
        }

        $game->save(); // save it to the database.

        //Redirect to a specified route with flash message.
        session()->flash('alert-success', "$game->title was successfully created!");
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
        $scoreArray = null;
        //Find a Game by it's ID
        $game = Games::findOrFail($id);

        //find scores in game
        $scores = Score::where('game_id',$game->id)->orderBy('score', 'desc')->get();

        //add each score to array
            foreach($scores as $score)
            {            
                $user = User::findOrFail($score->user_id); 
                
                $scoreArray[] = ['name'=> $user->name, 'score' => $score->score, 'score_id' => $score->id,'user_id' => $user->id, 'score_verification_image' => $score->score_verification_image, 'votes_to_ban' => $user->votes_to_ban];
            
            }

        //boolean to be changed in view if logged in user already has a score
        $hasScore = false;
        return view('games.show',[
            'game' => $game], compact('scoreArray', 'hasScore'));
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
        $request->validate([
            'title' => "required|string|min:2|max:191",
            'description'  => 'required|string|min:5|max:1000',
            'release' => 'required|date',
            'genre' => 'required|string',
            'perspective' => 'required|string',
            'platform' => 'required|string',
            'game_art' => 'image|mimes:jpeg,png,jpg,gif'
        ]);


        //Update the Game
        $game        = Games::findOrFail($id);
        $game->title = $request->input('title');
        $game->description  = $request->input('description');
        $game->release = $request->input('release');
        $game->genre = $request->input('genre');
        $game->perspective = $request->input('perspective');
        $game->platform = $request->input('platform');

        // Check if a profile image has been uploaded
        if ($request->has('game_art')) {
            // Get image file
            $image = $request->file('game_art');
            // Make a image name based on game title and current timestamp
            $name = str_slug($request->input('title')).'_'.time();
            // Define folder path
            $folder = '/uploads/gameImages/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $game->game_art = $filePath;
        }
        

        $game->save(); //Can be used for both creating and updating

        //Redirect to a specified route with flash message.
        session()->flash('alert-success', "$game->title was successfully updated!");
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
        session()->flash('alert-success', "$game->title was successfully deleted!");
        return redirect()
            ->route('games.index')
            ->with('status','Deleted the selected game!');
    }
}
