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

// Landing page (root route)
Route::get('/', function () {
    return view('welcome');
});

// Login/register
Auth::routes();

// Dashboard
Route::get('/home', 'HomeController@index')->name('home');

// Post
Route::get('/posts/create', 'PostController@create'); // route to the new post page
Route::post('/posts', 'PostController@store'); // create new post page