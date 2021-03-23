<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    @FilemanagerScript
    @yield('edit-css')

</head>

<body>
    <nav class="navbar navbar-expand-md shadow-sm  navbar-light padding-default">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/uploads/img/AsetWeb/{{ $logoweb->picture }}"
                alt="Logo" width="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/informasi">Informasi Desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/galeri">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aspirasi">Aspirasi</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" style="color:white;">
                @guest
                    <li class="">
                        <a class="nav-link btn button-info " style="color: white;"
                            href="{{ route('login') }}">{{ __('Bergabung') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="/uploads/img/UserProfile/{{ Auth::user()->profile }}" height="30px" style="border-radius:45%;">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/home" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="padding-default">
        <div class="box shadow " id="box">
            <div class="sideBox">
                <ul class="nav-header">
                    <li>
                        <a href="#" id="navbarToggle">
                            <span><i class="fas fa-bars"></i></span>
                            <span class="navText">Navbar</span>
                        </a>
                   </li>
                </ul>
                <ul>
                    <li class="">
                         <a href="/admin">
                             <span><i class="fas fa-tachometer-alt"></i></span>
                             <span  class="navText">Dashboard</span>
                         </a>
                    </li>
                    <li>
                         <a href="#" class="dropDown" data-target="#aspirasi">
                             <span><i class="fas fa-comment"></i></span>
                             <span  class="navText">Aspirasi</span>
                         </a>
                    </li>
                    <div class="dropDownItem" id="aspirasi">
                        <ul>
                            <li><a href="/admin/aspirasi">Semua aspirasi</a></li>
                            <li><a href="/admin/aspirasi/menunggu">Belum dikonfirmasi</a></li>
                            <li><a href="/admin/aspirasi/blokir">Aspirasi Dilarang</a></li>
                        </ul>
                    </div>
                    <li>
                        <a href="#" class="dropDown" data-target="#informasi">
                            <span><i class="fas fa-qrcode"></i></span>
                            <span  class="navText">Informasi desa</span>
                        </a>
                   </li>
                   <div class="dropDownItem" id="informasi">
                       <ul>
                           <li><a href="/admin/informasi">Semua Informasi</a></li>
                           <li><a href="/admin/informasi/baru">Buat informasi baru</a></li>
                       </ul>
                   </div>
                    <li>
                         <a href="#" class="dropDown" data-target="#forum">
                             <span><i class="fas fa-comments"></i></span>
                             <span  class="navText">Forum</span>
                         </a>
                    </li>
                    <div class="dropDownItem" id="forum">
                        <ul>
                            <li><a href="/admin/forum">Semua forum</a></li>
                            <li><a href="/admin/forum/new">Buat forum baru</a></li>
                            <li><a href="/admin/forum/Konfirmasi/participants">Konfirmasi Anggota</a></li>
                        </ul>
                    </div>
                    <li>
                        <a href="/admin/galeri">
                            <span><i class="fas fa-images"></i></span>
                            <span  class="navText">Galeri</span>
                        </a>
                   </li>
                    <li class="">
                        <a href="/admin/Data">
                            <span><i class="fas fa-server"></i></span>
                            <span  class="navText">Data Web</span>
                        </a>
                   </li>
                    <li>
                         <a href="#" class="dropDown" data-target="#data-diri">
                             <span><i class="fas fa-users-cog"></i></span>
                             <span  class="navText">Data diri</span>
                         </a>
                    </li>
                    <div class="dropDownItem" id="data-diri">
                        <ul>
                            <li><a href="/admin/biodata">Biodata</a></li>
                            <li><a href="{{ route('password.request') }}">Ganti passowrd</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
            <div class="rightBox">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/default.js') }}"></script>
    @yield('edit-js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

</body>

</html>
