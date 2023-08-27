@extends('layouts.appNoAuth')

@section('content')
<div class="">
    <div class="">
        <div class="wall">
            <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
        </div>
        @foreach ($cars as $car)
        <div class="cars">
            <a class="innerCars" href="{{ url('showcar/' . $car->id) }}" style="position:relative">
                <div class="innerCarsTop">
                    <img class="" src="{{ Storage::url('media/' . $car->car_numberPlate . '0sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}" />
                </div>
                @if ($car->car_soldOrBooked == 'Vendido')
                <div class="state"><img class="" src="{{ Storage::url('img/sold.png') }}"></div>
                @elseif ($car->car_soldOrBooked == 'Reservado')
                <div class="state"><img class="" src="{{ Storage::url('img/reservedBg.png') }}"></div>
                @else
                <div class="state"><img class="" src="{{ Storage::url('img/onsale.png') }}"></div>
                @endif
                <div class="bottomCars">
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
                        </h4>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection