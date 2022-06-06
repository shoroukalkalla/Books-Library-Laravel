@extends('layout')

@section('title')
    {{$category->name}}
@endsection

<div class="container p-5">
@section('content')

<div class="card text-white bg-secondary mb-3 w-75 m-auto" style="max-width: 25rem;">
    <div class="card-header">{{$category->name}} Category</div>
    <div class="card-body">
      <p class="card-title">Category ID: {{$category->id}}</p>
    </div>
    <div class="text-center mb-3">
        <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a>
    </div>
  </div>

@endsection
</div>

