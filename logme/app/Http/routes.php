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

Route::get('/', 'ActivityTracker@index');
Route::post('/log', ['as' => 'api::log', 'uses' => 'ActivityTracker@store']);
Route::get('/tags', ['as' => 'api::tags', 'uses' => 'ActivityTracker@tags']);

