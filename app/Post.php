<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // specifico i dati compilabili
    protected $fillable = ['title', 'content', ' author', 'slug', 'category'];
}
