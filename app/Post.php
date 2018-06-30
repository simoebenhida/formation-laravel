<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
