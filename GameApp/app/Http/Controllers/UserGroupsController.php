<?php

namespace App\Http\Controllers;

use App\UserGroup;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $users_group = UserGroup::sortable()->paginate(8);
        return view('usergroups.index',[
            'usergroups' => $users_group,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $users_group      = new Groups;
        $users_group->name = $request->name;
        $users_group->game_id  = $request->game_id;
        $users_group->user_id  = $request->user_id;
        
        $users_group->save(); // save it to the database.
        
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('usergroups.index')
            ->with('status','Group joined');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users_group = UserGroup::findOrFail($id);

        return view('usergroups.show',[
            'usergroup' => $users_group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
