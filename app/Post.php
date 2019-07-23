<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title', 'content', ' author', 'slug', 'category_id', 'public'];

  // nel post inserisco che un post può avere associata una sola categoria

     public function postImage(){
       return $this->hasOne('App\PostImage');
     }



    // one to many con categorie
    public function category (){
      return $this->belongsTo('App\category');
    }

    // many to many con i tags
    public function tags(){
      return $this->belongsToMany('App\Tag');
    }



    public function scopeIsPublic($query)
   {
       return $query->where('public', 1);
   }

   public function scopeByAuthor($query, $author){
     return $query->where('author', $author);
   }


}
