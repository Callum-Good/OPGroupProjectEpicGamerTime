<?php

namespace App\Http\Controllers;

use App\Groups;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GroupsController extends Controller
{
    use UploadTrait;

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
        $request->validate([
            'name' => 'required|string|unique:groups,name|min:2|max:191',
            'game_id'  => 'required|string|min:5|max:1000',
            'type' => 'required|string',
            'description' => 'required|string',
            'grp_image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        //custom validation error messages
        $messages = [
            'name.unique' => 'Group name should be unique',
        ];

        //First Validate the form data
        //$request->validate($rules,$messages);

        //Create a Group
        $group        = new Groups;
        $group->name = $request->input('name');
        $group->game_id  = $request->input('game_id');
        $group->type = $request->input('type');
        $group->description = $request->input('description');

        // Check if a profile image has been uploaded
        if ($request->has('grp_image')) {
            // Get image file
            $image = $request->file('grp_image');
            // Make a image name based on game title and current timestamp
            $name = str_slug($request->input('name'));
            // Define folder path
            $folder = '/uploads/grpImages/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $group->grp_image = $filePath;
        }
        else{
            $group->grp_image = '/uploads/grpImages/grpDefault.jpg';
        }


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
        //Find a group by it's ID
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
    public function edit($id)
    {
        //Find a Game by it's ID
        $group = Groups::findOrFail($id);

        return view('groups.edit',[
            'group' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validation rules
        $request->validate([
            'name' => 'required|string|min:2|max:191',
            'game_id'  => 'required|string|min:5|max:1000',
            'type' => 'required|string',
            'description' => 'required|string',
            'grp_image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);


        //Update the Group
        $group        = Groups::findOrFail($id);
        $group->name = $request->name;
        $group->game_id  = $request->game_id;
        $group->type = $request->type;
        $group->description = $request->description;

        // Check if a profile image has been uploaded
        if ($request->has('grp_image')) {
            // Get image file
            $image = $request->file('grp_image');
            // Make a image name based on game title and current timestamp
            $name = str_slug($request->input('title'));
            // Define folder path
            $folder = '/uploads/grpImages/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $group->grp_image = $filePath;
        }

        $group->save(); // save it to the database.

        return redirect()
            ->route('groups.show', $id)
            ->with('status','Updated the selected group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $groups = Groups::findOrFail($id);
        $groups->delete();

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('groups.index')
            ->with('status','Deleted the selected group');
    }

    public function addUserToGroup($user_id, $group_id){
        $group = Group::find([$group_id]);
        $user = User::find([$user_id]);
       

        $user->groups()->attach($group);

        return redirect()
            ->route('groups.index')
            ->with('status','Joined the selected group');
    }
}
