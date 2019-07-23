@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Tutti i post</h1>
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary"> Scrivi nuovo Post</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Copertina</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Categoria</th>
          <th>Tag</th>
          <th>Creato il</th>
        </tr>
      </thead>
   @forelse ($posts as $post)

       <tr>
         <td> {{$post->id}}</td>
         <td>
           @if (!empty($post->postImage))
             <img src="{{asset('storage/', $post->postImage->path)}}" alt="{{$post->postImage->alt}}">
            @else
              -
           @endif



         </td>
         <td>{{$post->title}}</td>
         <td>{{$post->author}}</td>
         <td>{{$post->slug}}</td>
         <td>{{!empty($post->category) ? $post->category->name : '-'}}</td>
         <td>
           @if (($post->tags)->isNotEmpty())
             @foreach ($post->tags as $tag)
               {{$tag->name}}@if (!$loop->last),@endif
             @endforeach
          @else
            '-'
           @endif
         </td>
         <td>{{$post->created_at}}</td>
         <td>

           <a class="btn btn-primary" href="{{route('admin.posts.show', $post->id)}}">Visualizza</a>
           <a class="btn btn-primary" href="{{route('admin.posts.edit', $post->id)}}">Modifica</a>
          <form class="" action="{{route('admin.posts.destroy' ,  $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" name="" value="Cancella">
          </form>
         </td>
       </tr>

   @empty
     <p>non ci sono post</p>

   @endforelse



</table>
  </div>

@endsection
