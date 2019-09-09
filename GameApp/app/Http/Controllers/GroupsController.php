<?php

namespace App\Http\Controllers;

use App\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::sortable()->paginate(8);
        //
        return view('groups.index',[
            'groups' => $groups,
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
        return view('groups.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation rules
        $rules = [
            'name' => 'required|string|unique:groups,name|min:2|max:191',
            'game_id'  => 'required|string|min:5|max:1000',
            'type' => 'required|string',
            'description' => 'required|string',
        ];
        //custom validation error messages
        $messages = [
            'name.unique' => 'Group name should be unique',
        ];

        //First Validate the form data
        $request->validate($rules,$messages);

        //Create a Group
        $group        = new Groups;
        $group->name = $request->name;
        $group->game_id  = $request->game_id;
        $group->type = $request->type;
        $group->description = $request->description;
        $group->save(); // save it to the database.

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('groups.index')
            ->with('status','Added a new group!');
           

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find a Game by it's ID
        $group = Groups::findOrFail($id);

        return view('groups.show',[
            'group' => $group,
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $groups)
    {
        //
        //validation rules
        $rules = [
            'name' => 'required|string|unique:groups,name|min:2|max:191',
            'game_id'  => 'required|string|min:5|max:1000',
            'type' => 'required|string',
            'description' => 'required|string',
        ];

        //custom validation error messages
        $messages = [
            'name.unique' => 'Group name should be unique',
        ];

        //First Validate the form data
        $request->validate($rules,$messages);

        //Update the Group
        $groups        = Games::findOrFail($id);
        $group->name = $request->name;
        $group->game_id  = $request->game_id;
        $group->type = $request->type;
        $group->description = $request->description;
        $group->save(); // save it to the database.

        return redirect()
            ->route('groups.index')
            ->with('status','Deleted the selected group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $groups)
    {
        //
        $groups = Groups::findOrFail($id);
        $groups->delete();

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('groups.index')
            ->with('status','Deleted the selected group');
    }
}
