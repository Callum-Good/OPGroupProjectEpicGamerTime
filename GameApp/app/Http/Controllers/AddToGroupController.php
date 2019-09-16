<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;
use App\User;

class AddToGroupController extends Controller
{
    //
    public function index(){
        $user = App\User::find(1);

        foreach ($user->Groups as $groups) {
    //
        $groups = App\User::find(1)->groups()->orderBy('name')->get();
        return $this->belongsToMany('App\Groups', 'users_groups');
        }
    
    }
}
