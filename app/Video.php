<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=['title','url','body'];
    
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag','taggable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
