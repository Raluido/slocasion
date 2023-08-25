@extends('layouts.appAboutUs')

@section('content')
    <div class="container">
        <div class="carInfo">
            <div class="d-flex justify-content-center">
                <div class="">
                    <h2 class="fs-1">{{ $car->car_brand }} {{ $car->car_model }}
                        {{ $car->car_doors }}p
                        {{ $car->car_horsePower }}cv {{ $car->car_cylinder }}cc {{ $car->car_motorFuel }}
                    </h2>
                    <div class="d-flex justify-content-end mt-4">
                        <h3 class="text-secondary">Precio {{ $car->car_price }}€</h3>
                    </div>
                </div>
            </div>
        </div>
            <div class="d-flex justify-content-center">
                <div class="csslider infinity" id="slider1">
                    <input type="radio" name="slides" checked="checked" id="slides_1" />
                    @for ($i = 2; $i <= $result + 1; $i++)
                        <input type="radio" name="slides" id="slides_{{ $i }}" />
                    @endfor
                    <ul class="obgaleria" id="galeria1">
                        @for ($j = 0; $j <= $result; $j++)
                            <li><img class="galleryImg"
                                    src="{{ Storage::url('media/' . $car->car_numberPlate . $j . 'sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}"></li>
                        @endfor
                    </ul>
                    <div class="arrows">
                        @for ($w = 1; $w <= $result + 1; $w++)
                            <label for="slides_{{ $w }}"></label>
                        @endfor
                        <label class="goto-first" for="slides_1"></label>
                        <label class="goto-last" for="slides_{{ $result + 1 }}"></label>
                    </div>
                    <div class="navigation d-none d-lg-block mt-3">
                        <div>
                            @for ($x = 0; $x <= $result; $x++)
                                <label for="slides_{{ $x + 1 }}"><img width="90vw" height="90vh"
                                        src="{{ Storage::url('media/' . $car->car_numberPlate . $x . 'sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}" /></label>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-flex justify-content-center text-center">
                <div class="">
                    <a href="https://wa.me/+34629294597/?text={{ $car->car_brand }} {{ $car->car_model }}"><img
                            class="" src="{{ Storage::url('img/WhatsApp_icon.png') }}" width="60"></a>
                    <p class="mt-2 fs-5">Estoy interesado!</p>
                </div>
            </div>
            <div class="d-block d-md-none text-center">
                <a href="https://wa.me/+34629294597/?text={{ $car->car_brand }} {{ $car->car_model }}"><img
                        class="" src="{{ Storage::url('img/WhatsApp_icon.png') }}" width="30"></a>
                <p class="mt-2">Estoy interesado!</p>
            </div>
        <div class="mt-5">
            <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-5 border-bottom border-secondary">
                    <h3 class="text-secondary">Detalles del vehículo</h3>
                </div>
                <div class="fs-3">
                    {{-- <h5 class="text-secondary">Matrícula</h5>
                    <p>{{ $car->car_brand }} --}}
                    <h5 class="text-secondary">Color</h5>
                    <p>{{ $car->car_color }}
                    <h5 class="text-secondary">Motor</h5>
                    <p>{{ $car->car_motorFuel }}
                    <h5 class="text-secondary">Transmisión</h5>
                    <p>{{ $car->car_gear }}
                    <h5 class="text-secondary">Carrocería</h5>
                    <p>{{ $car->car_body }}
                    <h5 class="text-secondary">Cilindrada</h5>
                    @php
                        $cyl = number_format($car->car_cylinder, 1);
                    @endphp
                    <p>{{ $cyl }} cc</p>
                    <h5 class="text-secondary">Tipo de vehículo</h5>
                    <p>{{ $car->car_horsePower }}
                    <h5 class="text-secondary">Fecha de matriculación</h5>
                    @php
                        $registration_date = explode('-', $car->car_registration_date);
                        $registration_dateFix = $registration_date[2] . '-' . $registration_date[1] . '-' . $registration_date[0];
                    @endphp
                    <p>{{ $registration_dateFix }}
                    <h5 class="text-secondary">Número de puertas</h5>
                    <p>{{ $car->car_doors }}
                    <h5 class="text-secondary">Kilometraje</h5>
                    @php
                        $km = number_format($car->car_km, 1);
                    @endphp
                    <p>{{ $km }} km</p>
                </div>
                <div class="">

                </div>
            </div>
            <div class="col-12 col-md-6 fs-4">
                <div class="mb-5 border-bottom border-secondary">
                    <h3 class="text-secondary">Equipamiento destacado</h3>
                </div>
                <div class="">
                    <p>{!! html_entity_decode($EquipmentOrdered) !!}</p>
                </div>
            </div>
            <div class="col-12 fs-4 mt-3">
                <div class="mb-5 border-bottom border-secondary">
                    <h3 class="text-secondary">Observaciones</h3>
                </div>
                <div class="">
                    <p>{{ $car->car_observations }}</p>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection