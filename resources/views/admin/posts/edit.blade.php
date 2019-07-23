@extends('layouts.app')
@section('content')

  @section('content')
    <div class="container">
      <h1>Creazione nuovo post</h1>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Torna a tutti i post</a>

      <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
          @method('PUT')
        @csrf
        <div class="form-group">
          <label for="title">Titolo:</label>
          <input class="form-control" type="text" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
          <label for="author">Autore:</label>
          <input class="form-control" type="text" name="author" value="{{ $post->author  }}">
        </div>
        <div class="form-group">
          <label for="content">Testo articolo:</label>
          <textarea class="form-control" name="content" rows="8" cols="80">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
          <select class="form-control" name="category_id">
            <option value="">{{ $category->name }}</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>TAG:</label>
          @foreach ($tags as $tag)

            <input  type="checkbox" value="{{$tag->id}}" name="tag_ids[]"
            @foreach ( as )
              @if($age->id == $ages->ages ) checked
              @endif @endforeach />
          @endforeach
        </div>
        

        <div class="form-group">
            <input class="btn btn-success" type="submit" value="Modifica">
        </div>
      </form>
    </div>

  @endsection

@endsection
