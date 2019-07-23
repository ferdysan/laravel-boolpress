@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>creazione nuovo post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Titolo</label>
        <input class="form-control" type="text" name="title" value="{{old('title')}}">
      </div>
      <div class="form-group">
        <label for="author">Autore</label>
        <input class="form-control" type="text" name="author" value="{{old('author')}}">
      </div>
      <div class="form-group">
        <label for="content">Testo</label>
        <textarea class="form-control" name="content" rows="8" cols="80">{{old('content')}}</textarea>
      </div>
      <div class="form-group">
        <select class="form-control" name="category_id">
          <option value="">seleziona la categoria</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}" {{old('category_id') ==$category->id ? 'selected' : ''}}>{{$category->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>TAG:</label><br>
        @foreach ($tags as $tag)
          <label><input type="checkbox" name="tags[]" value="{{$tag->id}}" >{{$tag->name}}</label>
        @endforeach
      </div>

      <div class="form-group">
        <label>Pubblico o Privato</label>
        <label><input type="radio" name="public" value="1">Pubblico</label>
        <label><input type="radio" name="public" value="0">Privato</label>
      </div>
      <div class="form-group">
         <label for="post_image">Immagine di copertina</label>
         <input type="file" name="post_image" class="form-control-file">

      </div>

      <div class="form-group">
        <input class ="btn btn-success" type="submit" name="" value="Crea">
      </div>
    </form>

  </div>

@endsection
