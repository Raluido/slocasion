@extends('layouts.appNoAuth')

@section('content')
<div class="">
    <div class="">
        <div class="wall">
            <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
        </div>
        @foreach ($cars as $car)
        <div class="car">
            <div class="innerCar">
                <div class="innerCarTop">
                    <img class="mainImage" src="{{ Storage::url('media/' . $car->car_numberPlate . '0sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}" />
                </div>
                @if ($car->car_soldOrBooked == 'Vendido')
                <a class="state" href="{{ url('showcar/' . $car->id) }}"><img class="img-fluid card-img-top overImage" src="{{ Storage::url('img/sold.png') }}"></a>
                @elseif ($car->car_soldOrBooked == 'Reservado')
                <a class="state" href="{{ url('showcar/' . $car->id) }}"><img class="img-fluid card-img-top overImage" src="{{ Storage::url('img/reservedBg.png') }}"></a>
                @else
                <a class="state" href="{{ url('showcar/' . $car->id) }}"><img class="img-fluid card-img-top overImage" src="{{ Storage::url('img/onsale.png') }}"></a>
                @endif
                <div class="bottomCar">
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
                        <h4 class="">{{ $car->car_motorFuel }} &bull; {{ $car->car_horsePower }} cv</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection