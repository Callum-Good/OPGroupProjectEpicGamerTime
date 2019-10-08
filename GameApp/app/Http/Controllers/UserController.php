<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::sortable()->paginate(8);

        return view('users.index',[
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        //Find a user by it's ID
        $user = User::findOrFail($id);

        return view('users.show',[
            'user' => $user,
        ]); 
    }
}
