<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User', 'author');
    }
    public function categories()
    {
    	return $this->belongsToMany('App\Category','category__posts');
    }
}
