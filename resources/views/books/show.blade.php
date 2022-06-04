@extends('layout')

@section('title')
    {{$book->title}}
@endsection

<div class="container p-5">
@section('content')

<div class="card text-white bg-secondary mb-3 w-75 m-auto" style="max-width: 25rem;">
    <div class="card-header">{{$book->title}}</div>
    <div class="card-body">
      <p class="card-title">Book ID: {{$book->id}}</p>
      <p class="card-text">Description: {{$book->description}}</p>
    </div>
    <div class="text-center mb-3">
        <a href="{{ route('books.index') }}" class="btn btn-info">Back</a>
    </div>
  </div>

@endsection
</div>

