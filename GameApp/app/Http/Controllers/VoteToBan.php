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
        $user = User::findOrFail($id);
        $user->increment('votes_to_ban');

        $votingUser = User::findOrFail(auth()->user()->id);

        $votingUser->has_voted = 1;
        $votingUser->update();

        return back();
    }
}
