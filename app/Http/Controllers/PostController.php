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
        $this->middleware('is.post.owner')->except(['index', 'show', 'myPosts', 'create', 'like', 'dislike']);
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

    // Endpoint: DELETE /posts/{id}
    public function destroy($id)
    {
        // Find an existing post to be deleted
        $post = Post::find($id);
        // Delete the post
        $post->delete();
        // Redirect the user somewhere
        return redirect("/posts");
    }

    // Endpoint: PUT /posts/{id}/archive
    public function archive($id)
    {
        $post = Post::find($id);
        $post->is_active = false;
        $post->save();
        return redirect("/posts");
    }

    // Endpoint: PUT /posts/{post_id}/{user_id}/like
    public function like($post_id, $user_id)
    {
        $post = Post::find($post_id);
        $post->likes()->attach($user_id);
        return redirect("/posts/$post_id");
    }

    // Endpoint: PUT /posts/{post_id}/{user_id}/dislike
    public function dislike($post_id, $user_id)
    {
        $post = Post::find($post_id);
        $post->likes()->detach($user_id);
        return redirect("/posts/$post_id");
    }
}
