<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Auth::check())
    <meta name="authUsername" content="{{Auth::User()->name}}">
    <meta name="authId" content="{{Auth::User()->id}}">
    @endif

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
    <div id="app">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between" style=" width:100%; z-index:3; min-height: 9vh; position: fixed;">

        <a class="navbar-brand" href="#">
          <img style="background: #343a40;" src="/media/logo.png" width="32" height="32" alt="">
          Le Gourmet
        </a>

            @guest
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="/login">Ingresar<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Registrarse</a>
              </li>
            </ul>
            @else
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/home">Inicio<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/receta">Recetas</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('User.show','self')}}" >perfil</a>
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
        <div style="position:relative; padding-top: 9vh;">
          @yield('content')
        </div>

    </div>


    <script type="text/javascript" src="{{ asset('js/popper.js') }}" ></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
