<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | TodosController
    |--------------------------------------------------------------------------
    | This controller will be responsible for creating, retrieving, updating
    | and deleting user from the database.
    |
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find a User by their ID
        $user = auth::user()->id;

        return view('users.show',[
            'user' => $user,
        ]);
    }

    /**
     * Show a form for editing a specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find a User by it's ID
        $user = User::findOrFail($id);

        return view('users.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update a specified User from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation rules
        $rules = [
            'title' => "required|string|unique:users,title,{$id}|min:2|max:191",
            'body'  => 'required|string|min:5|max:1000',
        ];

        //custom validation error messages
        $messages = [
            'title.unique' => 'User title should be unique',
        ];

        //First Validate the form data
        $request->validate($rules,$messages);

        //Update the User
        $user        = User::findOrFail($id);
        $user->title = $request->title;
        $user->body  = $request->body;
        $user->save(); //Can be used for both creating and updating

        //Redirect to a specified route with flash message.
        return redirect()
            ->route('users.show',$id)
            ->with('status','Updated the selected User!');
    }
}
