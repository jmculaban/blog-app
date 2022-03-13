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

    // Relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'post_likes');
    }
}
