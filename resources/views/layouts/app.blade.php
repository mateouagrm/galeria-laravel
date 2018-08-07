<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                         <li class="dropdown"><a href="#"  data-toggle="dropdown">Galeria <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('galeria')}}">Todas las Galerias</a></li>
                                <li><a href="{{url('album')}}">Mi Galeria</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"  data-toggle="dropdown">Album <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('album_create')}}">Crear Album</a></li>
                                <li><a href="{{url('album')}}">Mis Albums</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"  data-toggle="dropdown">Fotos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('upload_photo')}}">Subir Foto</a></li>
                                <li><a href="#">Ver Todas las Fotos</a></li>
                                <li><a href="#">Ver Mis Fotos</a></li>
                            </ul>
                        </li>
                    </ul>                   
                        @endguest
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     @stack('scripts')
</body>
</html>
