<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['description', 'filename'];
    
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
