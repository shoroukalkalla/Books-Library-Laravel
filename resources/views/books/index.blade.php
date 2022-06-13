@extends('layout')

@section('title')
    All Books
@endsection

<div class="container m-auto w-50">
@section('content')

        @auth    
        <div class="text-center mt-3 mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-success fs-5" style="width:150px">create</a>
        </div>
        @endauth
        
        <table class="table w-75 m-auto mb-2 text-center border border-1">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Book Title</th>
                <th scope="col">Book Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
              <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->title}}</td>
                <td>{{$book->description}}</td>
                <td>
                  @auth    
                  <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">show</a>
                  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">edit</a>
                  <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">delete</a>
                  @endauth
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
    <div class="w-50 m-auto d-flex justify-content-center">
        {{ $books->render() }} {{-- paginationCalling --}}
    </div>      
        @endsection
</div>

