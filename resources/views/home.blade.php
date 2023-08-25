@extends('layouts.appNoAuth')

@section('content')
<div class="">
    <div class="">
        <div class="wall">
            <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
        </div>
        @foreach ($cars as $car)
        <div class="">
            <div class="car">
                <div class="topCar">
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
                    <h2 class="">{{ $car->car_brand }} {{ $car->car_model }}
                        <br>{{ $car->car_doors }}p
                        <br>{{ $car->car_horsePower }}cv
                    </h2>
                    <h4> {{ $car->car_price }}€</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection