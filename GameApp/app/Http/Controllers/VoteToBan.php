<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VoteToBan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id){
        // Grabs the id of the user to be voted on
        $user = User::findOrFail($id);

        // Grabs the id of the user voting
        $votingUser = User::findOrFail(auth()->user()->id);
        
        // Checks to see if the first vote has been cast
        if ($user->voter_1 == 0){
            $user->voter_1 = $votingUser->id;
            $user->increment('votes_to_ban');
        }
        // Checks to see if the first vote has been cast or that the first person to vote is trying to do it again
        elseif (($user->voter_2 == 0) && ($user->voter_1 != $votingUser->id)){
            $user->voter_2 = $votingUser->id;
            $user->increment('votes_to_ban');
        }

        // Updates the user being voted on.
        $user->update();
        session()->flash('alert-success', "You voted to ban $user->name");
        return back();
    }
}
