@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <em>{{ $post->author }}</em>, <small>{{ $post->created_at }}</small>
    @if (!empty($post->category))
      <p>Categoria:
        <a href="{{ route('posts.category', $post->category->slug)}}">
          {{$post->category->name}}
        </a>
      </p>
    @endif

    <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Torna a tutti i post</a>
  </div>
@endsection
