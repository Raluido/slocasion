<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Venta de vehículos de segunda mano en Tenerife.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Raúl Luis Domínguez">
    <meta name="keywords" content="Vehículos, segunda mano, Tenerife">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="">
            <div class="mobileMenu">
                <div class="mobileMenuLogo">
                    <a class="" href="{{ url('/') }}"><img src="{{ Storage::url('/img/' . 'logo3.png') }}"></a>
                </div>
                <div class="mobileMenuButton">
                    <button class="">
                        <img src="{{ Storage::url('/img/mobileMenu.png') }}" alt="" class="">
                    </button>
                </div>
            </div>
            <div class="mobileMenuLinks d-none">
                <ul class="mobileMenuLinksTop">
                    <li class="">
                        <a class="" href="/">Principal</a>
                    </li>
                    <li class="">
                        <a class="" href="/aboutus">Sobre nosotros</a>
                    </li>
                    <li class="">
                        <a class="" href="/contact">Contacto</a>
                    </li>
                    @if(auth()->id())
                    <li class="">
                        <a class="" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @else
                    <li class="">
                        <a class="" href="/login">Login</a>
                    </li>
                    @endif
                </ul>
                <div class="mobileMenuBottom">
                    <a class="" href="https://api.whatsapp.com/send?phone=+34629294597"><i class="fab fa-whatsapp me-1"></i></a>
                    <a class="" href="http://www.facebook.com/SL-ocasión-106083305099628/"><i class="fab fa-facebook-f"></i></a>
                    <a class="" href="mailto:sumaymas@gmail.com"><i class="fas fa-at me-1"></i></a>
                </div>
            </div>
            <div class="desktopMenu d-none" id="">
                <div class="logo">
                    <a class="" href="{{ url('/') }}"><img src="{{ Storage::url('/img/' . 'logo3.png') }}"></a>
                </div>
                <div class="">
                    <ul class="">
                        <li class="">
                            <a class="" href="/">Principal</a>
                        </li>
                        <li class="">
                            <a class="" href="/aboutus">Sobre nosotros</a>
                        </li>
                        <li class="">
                            <a class="" href="/contact">Contacto</a>
                        </li>
                        <li class="">
                            <a class="" href="/login">Intranet</a>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <div class="">
                        <div class=""><a class="" href="https://api.whatsapp.com/send?phone=+34629294597"><i class="fab fa-whatsapp me-1"></i></a>
                        </div>
                        <div class=""><a class="" href="http://www.facebook.com/SL-ocasión-106083305099628/"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class=""><a class="" href="mailto:sumaymas@gmail.com"><i class="fas fa-at me-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="">
        @yield('content')
    </main>
    <footer class="">
        <div class="innerFooter">
            <div class="innerFooterTop">
                <div class="">
                    <h3 class="">¿AÚN TIENES DUDAS? TE LAS RESOLVEMOS</h3>
                    <button class=""><a class="" href="mailto:sumaymas@gmail.com">CONTACTA</a></button>
                </div>
            </div>
            <div class="innerFooterBottom">
                <a class="" href="https://goo.gl/maps/PhkNTNaXUaWnBzvDA" target="_blank">
                    <div class="">
                        <div class=""><i class="fas fa-map-marker-alt"></i></div>
                        <div class="">
                            <h3>Encuéntranos</h3>
                            <p class="">Calle Colegio 3, La Orotava , S/C de Tenerife</p>
                        </div>
                    </div>
                </a>
                <a class="" href="https://api.whatsapp.com/send?phone=+34629294597">
                    <div class="">
                        <div class=""><i class="fas fa-phone-alt"></i></div>
                        <div class="">
                            <h3>Llámanos / Envíanos un whatsapp</h3>
                            <p class="">+34 629 294 597</p>
                        </div>
                    </div>
                </a>
                <a class="" href="mailto:raul@websiwebs.es">
                    <div class="">
                        <div class=""><i class="fas fa-envelope-open"></i></div>
                        <div class="">
                            <h3>Escríbenos</h3>
                            <p class="">
                                sumaymas@gmail.com</p>
                        </div>
                    </div>
                </a>
                <div class="" id="transRegistered">
                    <p>&reg; &nbsp SL OCASIÓN ha sido desarrollada con cariño en HTML, CSS, PHP Y
                        JS.
                    </p>
                </div>
            </div>
    </footer>
</body>
<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('js/menu.js') }}"></script>
@yield('js')

</html>