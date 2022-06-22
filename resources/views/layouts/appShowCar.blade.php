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
    <div id="app">
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light row">
                    <div class="col-4">
                        {{-- <div class="d-flex align-items-center"> --}}
                            <img src="{{ Storage::url('/img/' . 'logo2.png') }}" width="70%"><a
                                class="navbar-brand" href="{{ url('/') }}"></a>
                            {{-- <h1 class="logoTitle">SL Ocasión</h1>
                        </div> --}}
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse col-5 d-flex justify-content-end mainMenu"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link me-md-5 text-dark" href="/">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-5 text-dark" href="/aboutus">Sobre nosotros</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link me-md-5 text-dark" href="/contact">Contacta</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="col-3 row d-flex justify-content-end iconSize">
                        <div class="col-auto"><a class="text-dark"
                                href="https://api.whatsapp.com/send?phone="><i class="fab fa-whatsapp me-1"></i></a>
                        </div>
                        <div class="col-auto"><a class="text-dark" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                        <div class="col-auto"><a class="text-dark" href="mailto:"><i
                                    class="fas fa-at me-1"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer id="contactSection" class="mt-5 row">
        <div class="bg-dark text-light text-center">
            <div class="d-md-flex justify-content-center align-items-center py-4">
                <h5 class="me-md-5" id="transDoubs">¿AÚN TIENES DUDAS? TE LAS RESOLVEMOS</h5>
                <a class="btn btn-light ms-md-5" href="contact.html" id="transContact">CONTACTA</a>
            </div>
        </div>
        <div class="my-5">
            <div class="row justify-content-around">
                <div class="col-12 col-sm-4">
                    <div class="">
                        <a class="contacts fs-5 text-decoration-none text-dark d-flex">
                            <i class="fas fa-map-marker-alt fs-1 me-4"></i>
                            <div>
                                <h4 id="transFindUs">Encuéntranos</h4>
                                <p class="fs-6">La Orotava, Santa Cruz de Tenerife</p>
                            </div>
                        </a>
                    </div>
                    <div class=" mt-4">
                        <a class="contacts fs-5 text-decoration-none text-dark d-flex"><i
                                class="fas fa-phone-alt fs-2 me-4"></i>
                            <div>
                                <h4 id="transCall">Llámanos / Envíanos un whatsapp</h4>
                                <p class="fs-6">+34 600
                                    765 339</p>
                            </div>
                        </a>
                    </div>
                    <div class="mt-4">
                        <a class="contacts fs-5 text-decoration-none text-dark d-flex"
                            href="mailto:raul@websiwebs.es"><i class="fas fa-envelope-open fs-2 me-4"></i>
                            <div>
                                <h4 id="transEmail">Escríbenos</h4>
                                <p class="fs-6">
                                    raul@websiwebs.es</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-5">

                </div>
                <div class="text-center" style="margin-top:100px;">
                    <p id="transRegistered">&regSl Ocasion ha sido desarrollada con cariño en HTML, CSS Y JS.</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>



{{-- style="border:1px solid black" --}}
