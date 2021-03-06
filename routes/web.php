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
Route::get('/posts', 'PostController@index'); // display all posts
Route::post('/posts', 'PostController@store'); // create new post page
Route::get('/posts/create', 'PostController@create'); // route to the new post page
Route::get('/posts/my-posts', 'PostController@myPosts'); // display the posts of owner
Route::get('/posts/{id}', 'PostController@show'); //display a single post
Route::put('/posts/{id}', 'PostController@update'); // update an existing post
Route::delete('/posts/{id}', 'PostController@destroy'); // delete an existing post
Route::get('/posts/{id}/edit', 'PostController@edit'); // display the post to be edited
Route::put('/posts/{id}/archive', 'PostController@archive'); // archive a post
Route::put('/posts/{post_id}/{user_id}/like', 'PostController@like');
Route::put('/posts/{post_id}/{user_id}/dislike', 'PostController@dislike');