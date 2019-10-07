<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', 'ProfileController@viewProfile')->name('profile');

Route::get('/editProfile', 'ProfileController@editProfile')->name('editProfile');

Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

Auth::routes();

Route::resource('/games','GamesController');

Route::resource('/groups', 'GroupsController');

Route::resource('/usergroups', 'UserGroupsController');

