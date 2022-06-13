@extends('layout')

@section('title')
    {{$book->title}}
@endsection

@section('content')

  <div class="card text-white bg-secondary w-75 m-auto mt-5" style="max-width: 25rem;">
      <div class="card-header"><h1>Book Details</h1></div>
      <div class="card-body">
        <p class="card-title"><b>Book ID:</b> {{$book->id}}</p>
        <p class="card-title"><b>Book Title:</b> {{{$book->title}}}</p>
        <p class="card-text"><b>Description:</b> {{$book->description}}</p>
        <hr/>
        <h4>Categories:</h4>
        <ul>
          @foreach ($book->categories as $category)
          <li><b>Category ID:</b> {{$category->id}}</li>
          <li><b>Category Name:</b> {{$category->name}}</li>
          @endforeach
        </ul>
      </div>
      <div class="text-center mb-3">
          <a href="{{ route('books.index') }}" class="btn btn-info">Back</a>
      </div>
    </div>
  
@endsection

