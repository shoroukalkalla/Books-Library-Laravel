@extends('layout')

@section('title')
    Update Category {{$category->id}}
@endsection

@section('content')
<form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" class="w-75 m-auto d-flex justify-content-center align-items-center flex-column vh-100">
    @csrf

    <div class="w-50">
        <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name') ?? $category->name}}">
            @if($errors->has('name'))
            <div class="alert alert-danger">{{$errors->first('name')}}</div>
            @endif
          </div>
    </div>

    @include('buttons.btn')
</form>
@endsection
