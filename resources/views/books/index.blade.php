@extends('layout')

@section('title')
    All Books
@endsection

<div class="container m-auto w-50">
@section('content')

        <div class="text-center mt-5 mb-5">
            <a href="{{ route('books.create') }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">create</a>
        </div>
        
        <table class="table w-75 m-auto mb-2 text-center">
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
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">show</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">edit</a>
                    <a href="{{ route('books.delete', $book->id) }}" class="btn btn-danger">delete</a>
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

