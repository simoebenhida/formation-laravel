<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function posts()
    {
        return $this->belongs('App\Post');
    }
}
