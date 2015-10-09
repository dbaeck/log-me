<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome')
        ->with('users', \App\User::all())
        ->with('projects', \App\Project::all())
        ->with('tags', \App\Tag::all())
        ->with('activities', \App\Activity::all());
});

Route::post('/log', ['as' => 'api::log', 'uses' => 'App\ActivityTracker@create']);
