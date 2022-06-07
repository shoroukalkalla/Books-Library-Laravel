@extends('layout')

@section('title')
    {{$category->name}}
@endsection

@section('content')

<div class="card text-white bg-secondary w-75 m-auto mt-5" style="max-width: 25rem;">
    <div class="card-header">{{$category->name}} Category</div>
    <div class="card-body">
      <p class="card-title">Category ID: {{$category->id}}</p>
    </div>
    <hr/>
      <h6>Books</h6>
      <ul>
        @foreach ($category->books as $book)
        <li>Book ID: {{$book->id}}</li>
        <li>Book Title: {{$book->title}}</li>
        <li>Book Description: {{$book->description}}</li>
        @endforeach
      </ul>
    <div class="text-center mb-3">
        <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a>
    </div>
  </div>

@endsection

