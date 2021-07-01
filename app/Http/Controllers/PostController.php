<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // model
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
        return redirect('/posts');
    }

    // Endpoint: GET /posts
    public function index()
    {
        // Retrieve all posts
        $posts = Post::all();
        // Redirect the user along with the posts
        return view('posts.index')->with('posts', $posts);
    }

    // Endpoint: GET /posts/{id}
    public function show($id)
    {
        // Retrieve a specific post
        $post = Post::find($id);
        // Redirect user to a location with that post
        return view('posts.show')->with('post', $post);
    }

    // Endpoint: GET /posts/my-posts
    public function myPosts()
    {
        $user_posts = Auth::user()->posts;
        return view('posts.index')->with('posts', $user_posts);
    }

    // Endpoint: GET /posts/{id}/edit
    public function edit($id)
    {
        // Find the post
        $post = Post::find($id);
        // Redirect the user to page where the post will be edited
        return view('posts.edit')->with('post', $post);
    }

    // Endpoint: PUT /posts/{id}
    public function update($id, Request $req)
    {
        // Find an existing post to be updated
        $post = Post::find($id); 
        // Set the new values of an existing post
        $post->title = $req->input('title');
        $post->content = $req->input('content');
        $post->save();
        // Redirect to page of individual post
        return redirect("/posts/$id");
    }
}
