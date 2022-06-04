@extends('layout')

@section('title')
    Update Book {{$book->id}}
@endsection

@section('content')
<form method="POST" action="{{ route('books.update', $book->id) }}" class="w-75 m-auto d-flex justify-content-center align-items-center flex-column vh-100">
    @csrf

    <div class="w-50">
        <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="title" value="{{$book->title}}">
          </div>
          <div class="form-group mb-3">
            <textarea class="form-control" name="description" rows="3" placeholder="description">{{$book->description}}</textarea>
          </div>
    </div>

    <div>
        <a href="{{ route('books.index') }}" class="btn btn-primary" style="width:80px">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
@endsection
