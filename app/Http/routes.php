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


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::post('post/uploadImage/{id}', 'PostController@uploadImages');
    Route::get('/listings', 'PostController@allPosts');
    Route::get('/listings/{id}', 'PostController@myPosts');
    Route::resource('post', 'PostController');
    Route::get('/', function () {
        //return 'Landing Page';
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');
    
});