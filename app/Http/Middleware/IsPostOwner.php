<?php

namespace App\Http\Middleware;

use Closure;

class IsPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->id); // die and dump
        // dd($request->user());

        // Allow to access a particular route, if and only if the
        // current user ID and equal to the post's user_id

        // Get the current user's ID
        $current_user_id = $request->user()->id;
        // dd($current_user_id);

        // Get the posts's user_id
        $post = \App\Post::find($request->id);
        // dd($post->user_id);
        if ($current_user_id !== $post->user_id) {
            return back();
        }

        return $next($request);
    }
}
