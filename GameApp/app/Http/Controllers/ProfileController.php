<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

class ProfileController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProfile()
    {
        return view('auth.profile');
    }

    public function editProfile(){
        return view('auth.editProfile');
    }

    public function updateProfile(Request $request)
    {
        // Form validation
        $request->validate([
            'name'              => 'required',
            'email'             => 'required|string|min:5|max:100',
            'bio'               => 'max:1000',
            'favorite_game'     => 'max:50',
            'profile_image'     => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set user name
        $user->name = $request->input('name');
        // Set email
        $user->email  = $request->input('email');
        // Set bio
        $user->bio  = $request->input('bio');
        // Set favorite game
        $user->favorite_game  = $request->input('favorite_game');

        //custom validation error messages
        $messages = [
            'name.unique' => 'This name is taken!',
        ];

        // Check if a profile image has been uploaded
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = $filePath;
        }

        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        session()->flash('alert-success', "You successfully update your profile!");

        return redirect()
            ->route('profile');
    }
}