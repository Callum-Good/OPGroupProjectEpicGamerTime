<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;
use App\User;
use App\UserGroup;

class AddUsersToGroup extends Controller
{
    //
    public function joinGroup()
    {
        $formData = request()->all();

        $group_id = $formData['group_id'];
        $user_id = $formData['user_id'];

        $usergroup = New UserGroup;
        $usergroup->user_id = $user_id;
        $usergroup->group_id = $group_id;

        $usergroup->save();
        //$group = Groups::find([$group_id]);
        //$user = User::find([$user_id]);
       

        //$user->groups()->attach($group);

        return redirect()
            ->route('groups.show',$group_id)
            ->with('status','Joined the selected group');
    }

    public function leaveGroup()
    {
        $formData = request()->all();

        $gid = $formData['group_id'];
        $uid = $formData['user_id'];
    
        $joined = UserGroup::where([
            ['group_id',$gid],
            ['user_id', $uid]
            ])->get();
    
           
        $userGroup = UserGroup::findOrFail($joined);
        foreach($userGroup as $u){
            $uGid = $u->id;
        }
       
        UserGroup::where('id', $uGid)->delete();
       // $userGroup->delete();
            
        return redirect()
            ->route('groups.show',$gid)
            ->with('status','Left the selected group');

    }
}
