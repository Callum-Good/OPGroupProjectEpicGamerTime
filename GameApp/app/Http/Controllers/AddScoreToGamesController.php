<?php

namespace App\Http\Controllers;

use Kyslik\ColumnSortable\Sortable;
use App\Games;
use App\User;
use App\Score;
use App\Traits\UploadTrait;

use Illuminate\Http\Request;

class AddScoreToGamesController extends Controller
{
    use UploadTrait;

    public function addScore(Request $request)
    {

        $formData = request()->all();
        
        $request->validate([
            'score'=>'required|numeric|max:99999999',
            'score_verification_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|required',
        ]);

        $game_id = $formData['game_id'];
        $user_id = $formData['user_id'];
        $highscore = $formData['score'];
        $score_verification_image = $formData['score_verification_image'];

        $score = New Score;
        
        $score->user_id = $user_id;
        $score->game_id = $game_id;
        $score->score = $highscore;
        $score->score_verification_image = $score_verification_image;

         // Get image file
         $image = $request->file('score_verification_image');
         // Make a image name based on score name and current timestamp
         $name = str_slug($request->input('name')).'_'.time();
         // Define folder path
         $folder = '/uploads/scoreImages/';
         // Make a file path where image will be stored [ folder path + file name + file extension]
         $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
         // Upload image
         $this->uploadOne($image, $folder, 'public', $name);
         // Set score profile image path in database to filePath
         $score->score_verification_image = $filePath;

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
