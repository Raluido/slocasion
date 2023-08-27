@extends('layouts.appAboutUs')

@section('content')
<div class="car">
    <div class="innerCar">
        <div class="innerCarMainCharacts">
            <div class="">
                <h3 class="">{{ strtoupper($car->car_brand) }} - {{ strtoupper($car->car_model) }}</h3>
            </div>
            <div class="pricesOptions">
                <div class="">
                    <h4 class="">Precio al contado</h4>
                    <h3 class="">
                        {{ number_format($car->car_price) }} €
                    </h3>
                </div>
                <div class="">
                    <h4 class="">Otros</h4>
                    <h3 class="">
                        Consultar
                    </h3>
                </div>
            </div>
            <div class="">
                <h4 class="">{{ $car->car_motorFuel }} &bull; {{ $car->car_horsePower }} cv &bull; {{ $car->car_cylinder }} cc</h4>
            </div>
        </div>
        <div class="innerCarGallery">
            <div class="csslider infinity" id="slider1">
                <input type="radio" name="slides" checked="checked" id="slides_1" />
                @for ($i = 2; $i
                <= $result + 1; $i++) <input type="radio" name="slides" id="slides_{{ $i }}" />
                @endfor
                <ul class="obgaleria" id="galeria1">
                    @for ($j = 0; $j <= $result; $j++) <li><img class="galleryImg" src="{{ Storage::url('media/' . $car->car_numberPlate . $j . 'sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}"></li>
                        @endfor
                </ul>
                <div class="arrows">
                    @for ($w = 1; $w <= $result + 1; $w++) <label for="slides_{{ $w }}"></label>
                        @endfor
                        <label class="goto-first" for="slides_1"></label>
                        <label class="goto-last" for="slides_{{ $result + 1 }}"></label>
                </div>
                <div class="navigation">
                    <div>
                        @for ($x = 0; $x <= $result; $x++) <label for="slides_{{ $x + 1 }}"><img width="90vw" height="90vh" src="{{ Storage::url('media/' . $car->car_numberPlate . $x . 'sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}" /></label>
                            @endfor
                    </div>
                </div>
            </div>
        </div>
        <div class="innerCarWtsappBg">
            <div class="">
                <a href="https://wa.me/+34629294597/?text={{ $car->car_brand }} {{ $car->car_model }}"><img class="" src="{{ Storage::url('img/WhatsApp_icon.png') }}" width="60"></a>
                <p class="">Estoy interesado!</p>
            </div>
        </div>
        <div class="innerCarWtsappSm">
            <a href="https://wa.me/+34629294597/?text={{ $car->car_brand }} {{ $car->car_model }}"><img class="" src="{{ Storage::url('img/WhatsApp_icon.png') }}" width="30"></a>
            <p class="mt-2">Estoy interesado!</p>
        </div>
        <div class="innerCarInfo">
            <div class="innerInfo">
                <div class="innerInfoDetails">
                    <div class="">
                        <h3 class="">Detalles del vehículo</h3>
                    </div>
                    <div class="fs-3">
                        <h5 class="">Color</h5>
                        <p>{{ $car->car_color }}
                        <h5 class="">Motor</h5>
                        <p>{{ $car->car_motorFuel }}
                        <h5 class="">Transmisión</h5>
                        <p>{{ $car->car_gear }}
                        <h5 class="">Carrocería</h5>
                        <p>{{ $car->car_body }}
                        <h5 class="">Cilindrada</h5>
                        @php
                        $cyl = number_format($car->car_cylinder, 1);
                        @endphp
                        <p>{{ $cyl }} cc</p>
                        <h5 class="">Tipo de vehículo</h5>
                        <p>{{ $car->car_horsePower }}
                        <h5 class="">Fecha de matriculación</h5>
                        @php
                        $registration_date = explode('-', $car->car_registration_date);
                        $registration_dateFix = $registration_date[2] . '-' . $registration_date[1] . '-' . $registration_date[0];
                        @endphp
                        <p>{{ $registration_dateFix }}
                        <h5 class="">Número de puertas</h5>
                        <p>{{ $car->car_doors }}
                        <h5 class="">Kilometraje</h5>
                        @php
                        $km = number_format($car->car_km, 1);
                        @endphp
                        <p>{{ $km }} km</p>
                    </div>
                    <div class="">

                    </div>
                </div>
                <div class="innerInfoImportant">
                    <div class="">
                        <h3 class="">Equipamiento destacado</h3>
                    </div>
                    <div class="">
                        <p>{!! html_entity_decode($EquipmentOrdered) !!}</p>
                    </div>
                </div>
                <div class="innerInfoNotes">
                    <div class="">
                        <h3 class="">Observaciones</h3>
                    </div>
                    <div class="">
                        <p>{{ $car->car_observations }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection