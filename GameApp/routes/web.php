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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('user/{id}', 'VoteToBan')->name('VoteToBan');

Route::get('/profile', 'ProfileController@viewProfile')->name('profile');

Route::get('/editProfile', 'ProfileController@editProfile')->name('editProfile');

Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');


Route::post('/games/addScore', 'AddScoreToGamesController@addScore')->name('AddScoreToGamesController.addScore');

Route::post('/games/deleteScore', 'AddScoreToGamesController@deleteScore')->name('AddScoreToGamesController.deleteScore');


Route::post('/groups/join', 'AddUsersToGroup@joinGroup')->name('AddUsersToGroup.joinGroup');

Route::post('/groups/leave', 'AddUsersToGroup@leaveGroup')->name('AddUsersToGroup.leaveGroup');

//Route::get('/groups/{group}', 'GroupsController@show');


Auth::routes(['verify' =>true]);


Route::resource('/games','GamesController');

Route::resource('/groups', 'GroupsController');

Route::resource('/users', 'UserController');



//Route::resource('/auth', 'ProfileController');

Route::resource('/scores', 'ScoreController');



