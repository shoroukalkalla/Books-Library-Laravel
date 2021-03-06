<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="">Library</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse  d-flex justify-content-between" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('books.index') }}">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('categories.index') }}">Categories</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              @guest    
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('auth.register') }}">Register</a>
              </li>
              <li>
                <a class="nav-link active" href="{{ route('auth.login') }}">Login</a>
              </li>
              @endguest

              @auth
              <li>
                <a class="nav-link disabled" href="#">{{ Auth::user()->name }}</a>
              </li>
              <li>
                <a class="nav-link active" href="{{ route('auth.logout') }}">Logout</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>

        @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>
