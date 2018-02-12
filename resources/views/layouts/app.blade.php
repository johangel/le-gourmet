<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Le Gourmet</title>
    <link rel="icon" href="{{ asset('media/logo.png')}}">
    <!-- Styles -->
    <style>
      body{
        background: #e3e3e3 !important;
      }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" style="height: 600px;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between" style="position:fixed; width:100%; z-index:3; height: 9vh;">

        <a class="navbar-brand" href="#">
          <img style="background: #343a40;" src="/media/logo.png" width="32" height="32" alt="">
          Le Gourmet
        </a>

            @guest
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">Log in <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Sign in</a>
              </li>
            </ul>
            @else
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/ranking">Ranking</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('User.show','self')}}" >perfil</a>
                  <a class="dropdown-item" href="#">opciones</a>
                  <a class="dropdown-item" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Salir</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                </div>
              </li>
            </ul>
          </div>
            @endguest
        </nav>
        <div style="position:relative;top:60px;">
          @yield('content')
        </div>

    </div>


    <script type="text/javascript" src="{{ asset('js/popper.js') }}" ></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
