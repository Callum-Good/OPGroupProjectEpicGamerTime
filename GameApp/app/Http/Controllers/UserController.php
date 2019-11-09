<?php

namespace App\Http\Controllers;

use App\User;
use App\Groups;
use App\UserGroup;
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
        $yourGroups = null;
        $groups = UserGroup::where('user_id', $user->id)->get();
        
        foreach($groups as $g){
            $grp = Groups::findorfail($g->group_id);
            $yourGroups[] = $grp;
        }
       
        return view('users.show',[
            'user' => $user],compact('yourGroups')); 
    }

    
}
