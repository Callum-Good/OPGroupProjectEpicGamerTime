<?php

namespace App\Http\Controllers;

use App\User;
use App\Games;
use App\Score;
use App\Traits\UploadTrait;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    use UploadTrait;

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
        //
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
            'score'=>'required',
            'score_verification_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|required'
        ]);

        $score = new Score;
        $score->score = $request->input('score');
        $score->game_id  = $request->game_id;
        $score->user_id  = $request->user_id;

        // Get image file
        $image = $request->file('score_verification_image');
        // Make a image name based on score name and current timestamp
        $name = str_slug($request->input('id')).'_'.time();
        // Define folder path
        $folder = '/uploads/scoreImages/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        // Upload image
        $this->uploadOne($image, $folder, 'public', $name);
        // Set score profile image path in database to filePath
        $score->score_verification_image = $filePath;

        $score->save();

        return redirect()
            ->route('games.show')
            ->with('status','Added new score');
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
        $score_id = Score::findOrFail($id);

        //find scores in game
        $scores = Score::where('game_id',$score_id->id)->get();

        //add each score to array
            foreach($scores as $score)
            {            
                $user = User::findOrFail($score->user_id); 
                $games = User::findOrFail($score->game_id); 
                
                $scoreArray[] = ['name'=> $user->name, 
                'score' => $score->score,
                'score_id' => $score->id,'user_id' => $user->id,
                'game_id'=> $games->id, 
                'score_verification_image' => $score->score_verification_image];
            
            }

        //boolean to be changed in view if logged in user already has a score
        $hasScore = false;
        return view('scores.show',[
            'score_id' => $score_id], compact('scoreArray', 'hasScore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
