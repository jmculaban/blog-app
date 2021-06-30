<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // snake_case + plural of the model name = tabe_name => posts
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
}
