<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body'];

    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

    // Get all of the tags for the post.
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}


// posts
//     id - integer
//     name - string

// videos
//     id - integer
//     name - string

// tags
//     id - integer
//     name - string

// taggables
//     tag_id - integer
//     taggable_id - integer
//     taggable_type - string