@extends('layout')

@section('title')
    Create Book
@endsection

@section('content')
<form method="POST" action="{{ route('books.store') }}" class="w-75 m-auto d-flex justify-content-center align-items-center flex-column vh-100">
    @csrf
    <div class="w-50">
        <div class="form-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">
            @if($errors->has('title'))
            <div class="alert alert-danger">{{$errors->first('title')}}</div>
            @endif
          </div>
          <div class="form-group mb-3">
            <textarea class="form-control"name="description" rows="3" placeholder="description">{{old('description')}}</textarea>
            @if($errors->has('description'))
            <div class="alert alert-danger">{{$errors->first('description')}}</div>
            @endif
          </div>
    </div>

    @include('buttons.btn')

</form>
@endsection

