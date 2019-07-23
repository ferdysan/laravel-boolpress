<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');
// rotta che mi controlla i post
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');
// lo slug
Route::get('/categories/{slug}', 'PostController@postInCategory')->name('posts.category');

Route::post('/posts-by-author', 'PostController@filterPostByAuthor')->name('posts.filterByAuthor');

Route::get('/author/{author_name}', 'PostController@postByAuthor')->name('posts.author');


Auth::routes();


// modo di raggruppare rotte che hanno caratteristiche simili
// il namespace mi inserisce davanti le mie rotte il preficco Admin per trovare la cartella dove
// ho i controller

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('/posts', 'PostController');
  // Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');
  // Route::get('/posts/{slug}', 'PostControler@edit')->name('posts.edit');
});
