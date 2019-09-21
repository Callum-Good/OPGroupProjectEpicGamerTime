<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function myProfile()
    {
        //returns the user's own profile page
        return view('user.myProfile');
    }

    public function editProfile()
    {
        //returns a view where a user can edit their own profile
        return view('user.editProfile');
    }

    // TO BE IMPLEMENTED
    /*public function yourProfile()
    {
        //returns another user's profile

        return view('user.yourProfile');
    }*/
}
