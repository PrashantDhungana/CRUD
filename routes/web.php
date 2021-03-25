<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::namespace('App\Http\Controllers')->group(function () 
{
    //Read all the Posts
    Route::get('/post','PostController@index');

    //Create a new post
    Route::get('/post/create','PostController@create'); //View
    Route::post('/post','PostController@store'); //Logical Part

    //Edit a POST
    Route::get('/post/{id}/edit','PostController@edit'); //View
    Route::post('/post/{id}','PostController@update'); //Logical Part

    //Show individual data
    Route::get('/post/{id}','PostController@show');

    //Delete an indicidual post
    Route::delete('/post/{id}','PostController@destroy');


});

// Route::resource();