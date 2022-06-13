@extends('layout')

@section('title')
    All Categories
@endsection

<div class="container m-auto w-50">
@section('content')

        @auth    
        <div class="text-center mt-3 mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-success fs-5" style="width:150px">create</a>
        </div>
        @endauth
        
        <table class="table w-75 m-auto mb-2 text-center border border-1">
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
                  @auth    
                  <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">show</a>
                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">edit</a>
                  <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger">delete</a>
                  @endauth
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

