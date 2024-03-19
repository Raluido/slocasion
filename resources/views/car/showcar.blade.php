@extends('layouts.appNoAuth')

@section('content')
<div class="car">
    <div class="innerCar">
        <div class="innerCarMainCharacts">
            <div class="">
                <h2 class="">{{ strtoupper($car->car_brand) }} - {{ strtoupper($car->car_model) }}</h2>
            </div>
            <div class="pricesOptions">
                <div class="">
                    <h3 class="">Precio al contado</3>
                        <h2 class="">
                            {{ number_format($car->car_price) }} €
                        </h2>
                </div>
                <div class="">
                    <h3 class="">Otros</h3>
                    <h2 class="">
                        Consultar
                    </h2>
                </div>
            </div>
            <div class="">
                <h2 class="">{{ $car->car_motorFuel }} &bull; {{ $car->car_horsePower }} cv &bull; {{ $car->car_cylinder }} cc</h2>
            </div>
        </div>
        <div class="innerCarGallery">
            <div class="csslider infinity" id="slider1">
                <input type="radio" name="slides" checked="checked" id="slides_1" />
                @for ($i = 2; $i<= count($items); $i++) 
                    <input type="radio" name="slides" id="slides_{{ $i }}" />
                @endfor
                <ul class="obgaleria" id="galeria1">
                    @for ($j = 0; $j < count($items); $j++) 
                    <li><img class="galleryImg" src="{{ Storage::disk('images')->url($car->id . '/' . $items[$j]->filename) }}"></li>
                    @endfor
                </ul>
                <div class="arrows">
                    @for ($w = 1; $w <= count($items); $w++) 
                    <label for="slides_{{ $w }}"></label>
                    @endfor
                    <label class="goto-first" for="slides_1"></label>
                    <label class="goto-last" for="slides_{{ count($items) }}"></label>
                </div>
                <div class="navigation">
                    <div>
                        @for ($x = 0; $x < count($items); $x++) <label for="slides_{{ $x + 1 }}"><img src="{{ Storage::disk('images')->url($car->id . '/' . $items[$x]->filename) }}" /></label>
                            @endfor
                    </div>
                </div>
            </div>
        </div>
        <a class="innerCarWtsapp" href="https://wa.me/+34629294597/?text={{ $car->car_brand }} {{ $car->car_model }}">
            <div class="innerCarWtsappLogo">
                <img class="" src="{{ Storage::url('img/WhatsApp_icon.png') }}">
            </div>
            <p class="mt-2">Estoy interesado!</p>
        </a>
        <div class="innerCarInfo">
            <div class="innerInfo">
                <div class="innerInfoDetails">
                    <div class="title">
                        <h2 class="">Detalles del vehículo</h2>
                    </div>
                    <div class="items">
                        <h3 class="">Color</h3>
                        <h2>{{ $car->car_color }}</h2>
                        <h3 class="">Motor</h3>
                        <h2>{{ $car->car_motorFuel }}</h2>
                        <h3 class="">Transmisión</h3>
                        <h2>{{ $car->car_gear }}</h2>
                        <h3 class="">Carrocería</h3>
                        <h2>{{ $car->car_body }}</h2>
                        <h3 class="">Cilindrada</h3>
                        @php
                        $cyl = number_format($car->car_cylinder, 1);
                        @endphp
                        <h2>{{ $cyl }} cc</h2>
                        <h3 class="">Tipo de vehículo</h3>
                        <h2>{{ $car->car_body }}</h2>
                        <h3 class="">Fecha de matriculación</h3>
                        @php
                        $registration_date = explode('-', $car->car_registration_date);
                        $registration_dateFix = $registration_date[2] . '-' . $registration_date[1] . '-' . $registration_date[0];
                        @endphp
                        <h2>{{ $registration_dateFix }}</h2>
                        <h3 class="">Número de puertas</h3>
                        <h2>{{ $car->car_doors }}</h2>
                        <h3 class="">Kilometraje</h3>
                        @php
                        $km = number_format($car->car_km, 1);
                        @endphp
                        <h2>{{ $km }} km</h2>
                    </div>
                </div>
                <div class="innerInfoImportant">
                    <div class="title">
                        <h2 class="">Equipamiento destacado</h2>
                    </div>
                    <div class="items">
                        <h3>{{ $car->car_equipment }}</h3>
                    </div>
                </div>
                <div class="innerInfoNotes">
                    <div class="title">
                        <h2 class="">Observaciones</h2>
                    </div>
                    <div class="items">
                        <p>{{ $car->car_observations }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection