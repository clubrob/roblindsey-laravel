<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'slug_time'];
    
    public function detail()
    {
        return $this->hasOne('App\PostDetail', 'post_id');
    }

    public function photos()
    {
        return $this->belongsToMany('App\Photo');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
