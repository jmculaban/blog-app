<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // model
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Endpoint: /posts/create
    public function create()
    {
        return view('posts.create');
    }

    // Endpoint: /posts
    public function store(Request $req)
    {
        // Create a new post object
        $new_post = new Post ([
            'title' => $req->input('title'),
            'content' => $req->input('content'),
            'user_id' => Auth::user()->id
        ]);
        // Save it to the database
        $new_post->save();
        // Redirect user somewhere
        return redirect('/posts/create');
    }
}
