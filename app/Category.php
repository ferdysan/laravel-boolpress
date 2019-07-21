<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // inserisco al pluarale per indicare che una categoria è associata a molti post
    public function posts(){
      return $this->hasMany('App\Post');
    }
}
