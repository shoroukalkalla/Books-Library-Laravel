@extends('layout')

@section('title')
    Registeration
@endsection

@section('content')

<form method="POST" action="{{route('auth.handleRegister')}}" class="w-50 m-auto d-flex justify-content-center align-items-center flex-column">
   @csrf 
    <div class="mb-3 w-50 mt-5">
        <label class="form-label" for="registerEmail">Name</label>
        <input type="text" class="form-control" name="name" id="registerEmail">
    </div>
    <div class="mb-3 w-50">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-50">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Submit</button>
    <a href="{{route('auth.github.redirect')}}" class="btn btn-primary">Sign Up with GitHub</a>
</form>
@endsection