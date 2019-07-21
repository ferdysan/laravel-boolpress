<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title', 'content', ' author', 'slug', 'category_id'];

  // nel post inserisco che un post può avere associata una sola categoria

    public function category (){
      return $this->belongsTo('App\category');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }
}
