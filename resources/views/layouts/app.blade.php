<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Venta de vehículos de segunda mano en Tenerife.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Raúl Luis Domínguez">
    <meta name="keywords" content="Vehículos, segunda mano, Tenerife">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/gallery.js') }}" defer></script> --}}
    {{-- <script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' type='text/javascript'></script> --}}
    <script src="{{ asset('js/jquery-3.6.0.slim.min.js') }}"></script>

    <!-- Fonts -->
    {{--  <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light border-bottom shadow-sm bg-light">
                <div class="d-lg-flex justify-content-between w-100">
                    <div class="">
                        <div class="row">
                            <div class="col-6 col-lg-9">
                                <div class="">
                                    <a class="navbar-brand" href="{{ url('/admin') }}"><img
                                            src="{{ Storage::url('/img/' . 'logo3.png') }}"></a>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 d-flex align-items-center justify-content-end">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse mainMenu" id="navbarSupportedContent">
                    <div class="">
                        <ul class="navbar-nav me-auto">
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
    </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>
