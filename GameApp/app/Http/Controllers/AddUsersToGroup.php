<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;
use App\User;

class AddUsersToGroup extends Controller
{
    //
    public function addUserToGroup($user_id, $group_id){
        $group = Groups::find([$group_id]);
        $user = User::find([$user_id]);
       

        $user->groups()->attach($group);

        return redirect()
            ->route('groups.show',$group->id)
            ->with('status','Joined the selected group');
    }
}
