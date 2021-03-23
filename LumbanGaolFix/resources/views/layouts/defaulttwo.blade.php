<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    @yield('edit-css')
</head>
<body style="background-image: url('/uploads/img/AsetWeb/LumbanGaol-Background-Login.jpg');background-size: cover;">
    <nav class="navbar navbar-expand-md navbar-dark padding-default">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/uploads/img/AsetWeb/LumbanGaol-LogoWeb.png" alt="Logo" width="50px"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/" style="font-size: 20px;color:white;">Beranda</a>
            </li>
             @guest
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="/login" style="font-size: 20px;color:white;">Masuk</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/register" style="font-size: 20px;color:white;">Mendaftar</a>
                    </li>
                </ul>
                @else
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="/home" style="font-size: 20px;color:white;">
                          <img src="/uploads/img/UserProfile/{{ Auth::user()->profile }}" height="30px" style="border-radius:45%;">
                            {{ Auth::user()->name }}
                      </a>
                    </li>
                </ul>
                @endguest
        </div>
      </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('edit-js')
</body>
</html>
