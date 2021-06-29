<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
