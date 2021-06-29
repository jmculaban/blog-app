<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Endpoint: /posts/create
    public function create()
    {
        return view('posts.create');
    }
}
