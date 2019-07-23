@extends('layouts.app')

@section('content')
  <div class="container">
    <ul>
      <form class="" action="{{route('posts.author')}}" method="post">
        @csrf
        <select name="author">
         <option value="">Scegli un autore</option>
            @foreach ($authors as $author_record)
               <option value="{{$author_record->author}}">{{$author_record->author}}</option>
            @endforeach
        </select>
        <input type="submit" name="" value="Filtra per autore">
      </form>

   @forelse ($posts as $post)

       <li>
         <a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a>,
         di {{$post->author}}, del {{$post->created_at}} - <em>
            @if (!empty($post->category))
              (<a href="{{route('posts.category', $post->category->slug )}}">{{$post->category->name}})</a>
            @else
              (-)
            @endif
          </em>
          @if (($post->tags)->isNotEmpty())
            TAG:
            @foreach ($post->tags as $tag)
              {{$tag->name}}@if(!$loop->last),@endif
            @endforeach
          @endif
       </li>



   @empty
     <p>non ci sono post</p>

   @endforelse
 </ul>
 {{$posts->links()}}
  </div>

@endsection
