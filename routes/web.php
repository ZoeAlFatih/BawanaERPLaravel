<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('profile', 'User\ProfileController');
Route::put('profile/{profile}/updateprofilepicture', ['uses' => 'User\ProfileController@updateProfilePicture', 'as'   => 'profile.updateprofilepicture']);
Route::put('profile/{profile}/updatepassword', ['uses' => 'User\ProfileController@updatePassword', 'as'   => 'profile.updatepassword']);
Route::post('profile/uploadattachment', ['uses' => 'User\ProfileController@uploadUserAttachment', 'as'   => 'profile.uploadattachment']);