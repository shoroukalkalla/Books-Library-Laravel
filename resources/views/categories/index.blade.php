@extends('layout')

@section('title')
    All Categories
@endsection

<div class="container m-auto w-50">
@section('content')

        <div class="text-center mt-5 mb-5">
            <a href="{{ route('categories.create') }}" class="btn btn-success">create</a>
        </div>
        
        <table class="table w-75 m-auto mb-2 text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
              <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">show</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">edit</a>
                    <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger">delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
    <div class="w-50 m-auto d-flex justify-content-center">
        {{ $categories->render() }} 
    </div>      
        @endsection
</div>

