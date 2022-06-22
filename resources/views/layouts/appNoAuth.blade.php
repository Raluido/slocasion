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
                                    <a class="navbar-brand" href="{{ url('/') }}"><img
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
                    <div class="collapse navbar-collapse mainMenu" id="navbarSupportedContent">
                        <div class="mx-auto">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link me-md-5 text-dark" href="/">Principal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-md-5 text-dark" href="/aboutus">Sobre nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-md-5 text-dark" href="/contact">Contacto</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex d-sm-none mt-2">
                            <div class="row">
                                <div class="col"><a class="text-dark"
                                        href="https://api.whatsapp.com/send?phone=+34629294597"><i
                                            class="fab fa-whatsapp me-1"></i></a>
                                </div>
                                <div class="col"><a class="text-dark"
                                        href="http://www.facebook.com/SL-ocasión-106083305099628/"><i
                                            class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="col"><a class="text-dark"
                                        href="mailto:sumaymas@gmail.com"><i class="fas fa-at me-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-flex align-items-center me-3 iconSize">
                        <div class="row">
                            <div class="col-auto"><a class="text-dark"
                                    href="https://api.whatsapp.com/send?phone=+34629294597"><i
                                        class="fab fa-whatsapp me-1"></i></a>
                            </div>
                            <div class="col-auto"><a class="text-dark"
                                    href="http://www.facebook.com/SL-ocasión-106083305099628/"><i
                                        class="fab fa-facebook-f"></i></a>
                            </div>
                            <div class="col-auto"><a class="text-dark" href="mailto:sumaymas@gmail.com"><i
                                        class="fas fa-at me-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="d-none d-lg-flex mt-3">
                <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}" width="100%" height="200px">
            </div>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="">
                <div class="bg-dark text-light text-center">
                    <div class="d-md-flex justify-content-center align-items-center py-4">
                        <h5 class="me-md-5">¿AÚN TIENES DUDAS? TE LAS RESOLVEMOS</h5>
                        <a class="btn btn-light ms-md-5" href="mailto:sumaymas@gmail.com">CONTACTA</a>
                    </div>
                </div>
                <div class="my-5">
                    <div class="row justify-content-around w-100">
                        <div class="col-12 col-sm-4">
                            <div class="d-flex">
                                <a class="fs-5 text-decoration-none text-dark d-flex">
                                    <i class="fas fa-map-marker-alt fs-1 me-4"></i>
                                    <div>
                                        <h4>Encuéntranos</h4>
                                        <a class="text-decoration-none text-dark"
                                            href="https://goo.gl/maps/PhkNTNaXUaWnBzvDA" target="_blank">
                                            <p class="fs-6">Calle Colegio 3, La Orotava, Santa Cruz de
                                                Tenerife
                                            </p>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="mt-4 d-flex">
                                <a class="fs-5 text-decoration-none text-dark d-flex"><i
                                        class="fas fa-phone-alt fs-2 me-4"></i>
                                    <div>
                                        <h4>Llámanos / Envíanos un whatsapp</h4>
                                        <a class="text-dark text-decoration-none"
                                            href="https://api.whatsapp.com/send?phone=+34629294597">
                                            <p class="fs-6">+34 629 294 597</p>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="mt-4">
                                <a class="fs-5 text-decoration-none text-dark d-flex" href="mailto:raul@websiwebs.es"><i
                                        class="fas fa-envelope-open fs-2 me-4"></i>
                                    <div>
                                        <h4>Escríbenos</h4>
                                        <p class="fs-6">
                                            sumaymas@gmail.com</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-5">

                        </div>
                        <div class="text-center" style="margin-top:100px;">
                            <p id="transRegistered">&regSL OCASIÓN ha sido desarrollada con cariño en HTML, CSS, PHP Y
                                JS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>



{{-- style="border:1px solid black" --}}
