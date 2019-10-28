<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VoteToBan extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id){
        $user = User::findOrFail($id);
        $user->increment('votes_to_ban');

        return view('users.show',[
            'user' => $user,
        ]); 
    }
}
