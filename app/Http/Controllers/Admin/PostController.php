<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use App\PostImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories=Category::all();
        $tags= Tag::all();
        return view('admin.posts.create')->with([
        'categories'=>$categories,
        'tags' => $tags
        ]);
    }


    public function store(Request $request)
    {

      $validatedData = $request->validate([
          'title' => 'required|unique:posts|max:255',
          'content' => 'required',
          'author' => 'required',
          'category_id' => 'required'
      ]);

        $dati= $request->all();
        $dati['slug']= Str::slug($dati['title']);

        // recupero la categoria selezionata
        $category =Category::find($dati['category_id']);
        // effettuo il controllo dell'id ricevuto se non esiste lo imposto unset
        if (empty($category)) {
          unset($dati['category_id']);
        }

        // creo il nuovo post, assegno i valori e salvo a db

        $newPost = new Post();
        $newPost->fill($dati);
        $newPost->save();
        // salvo le associazioni con i tag selezionati dall'utente
        $newPost->tags()->sync($dati['tags']);
        // salvo l'immagine di copertina partendo da public
        $img= Storage::put('post_images', $dati['post_image']);
        $newPostImage= new PostImage();
        $newPostImage->path= $img;
        $newPost->postImage()->save($newPostImage);

        return redirect()->route('admin.posts.index');
    }


    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }


    public function edit($id)
    {
      $post = Post::find($id);
      $categories = Category::all();
      $category = Category::find($id);
      $tags = Tag::all();

      return view('admin.posts.edit')->with([
      'categories'=>$categories,
      'post' => $post,
      'category'=>$category,
      'tags'=>$tags
      ]);

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
