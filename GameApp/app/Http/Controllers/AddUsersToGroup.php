<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddUsersToGroup extends Controller
{
    //
    public function addUserToGroup($user_id, $group_id){
        $group = Group::find([$group_id]);
        $user = User::find([$user_id]);
       

        $user->groups()->attach($group);

        return redirect()
            ->route('groups.index')
            ->with('status','Joined the selected group');
    }
}
