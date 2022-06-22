@extends('layouts.appNoAuth')

@section('content')
    <div class="container-fluid mt-1" style="width:95%">
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card">
                        <img class="img-fluid mainImage"
                            src="{{ Storage::url('media/' . $car->car_numberPlate . '0sm.' . pathinfo($car->car_photo_main, PATHINFO_EXTENSION)) }}" />
                        @if ($car->car_soldOrBooked == 'Vendido')
                            <a href="{{ url('showcar/' . $car->id) }}"><img class="img-fluid card-img-top overImage"
                                    src="{{ Storage::url('img/sold.png') }}"></a>
                        @elseif ($car->car_soldOrBooked == 'Reservado')
                            <a href="{{ url('showcar/' . $car->id) }}"><img class="img-fluid card-img-top overImage"
                                    src="{{ Storage::url('img/reservedBg.png') }}"></a>
                        @else
                            <a href="{{ url('showcar/' . $car->id) }}"><img class="img-fluid card-img-top overImage"
                                    src="{{ Storage::url('img/onsale.png') }}"></a>
                        @endif
                        <div class="card-body">
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



{{-- style="border:1px solid black" --}}
