<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
      // recupero tutti i post
      // tramite paginate dico di recuperare 10 post per volta
      //

      $posts= Post::isPublic()->orderBy('title', 'ASC')->paginate(10);
      $authors = DB::table('posts')->select('author')->distinct()->get();

      return view('home')->with([
        'posts'=>$posts,
        'authors'=>$authors
      ]);
    }
}
