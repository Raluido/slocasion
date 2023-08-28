@extends('layouts.appNoAuth')

@section('content')
@auth
<div class="adminShowCars">
    <div class="innerAdminShowCars">
        <div class="add">
            <button class=""><a class="" href="{{ url('/newcar') }}">{{ Lang::get('car.newCar') }}</a></button>
        </div>
        @foreach ($cars->sortBy('car_SoldOrBooked') as $car)
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
                    <form method="POST" action="/updatestatus/{{ $car->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="">
                                <select name="car_soldOrBooked" id="car_soldOrBooked">
                                    <option value="En venta" @if ($car->car_soldOrBooked == 'En venta') selected="selected" @endif>En venta
                                    </option>
                                    <option value="Vendido" @if ($car->car_soldOrBooked == 'Vendido') selected="selected" @endif>Vendido
                                    </option>
                                    <option value="Reservado" @if ($car->car_soldOrBooked == 'Reservado') selected="selected" @endif>Reservado
                                    </option>
                                </select><br>
                            </div>
                            <div class="">
                                <button class="" type="submit">{{ Lang::get('car.car_changeStatus') }}</button>
                            </div>
                        </div>
                    </form>
                    <div class="">
                        <div class="edit"><button class=""><a class="" href="{{ url('editcar/' . $car->id) }}">{{ Lang::get('car.editCar') }}</a></button>
                        </div>
                        <div class="delete"><button class=""><a class="" href="{{ url('deletecar/' . $car->id) }}">Eliminar</a></button>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endauth
@endsection