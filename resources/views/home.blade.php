@extends('layouts.appNoAuth')

@section('content')
<div class="home">
    <div class="innerHome">
        <div class="top">
            <div class="wall">
                <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
            </div>
            <div class="messages">
                @include('layouts.partials.messages')
            </div>
            @auth('web')
            <div class="add">
                <button class="blueButton"><a class="text-white" href="{{ url('/newcar') }}">{{ Lang::get('car.newCar') }}</a></button>
            </div>
            @endauth
        </div>
        <div class="bottom">
            @if(is_string($cars))
            <p class="emptyPosts">{{ $cars }}</p>
            @else
            @foreach ($cars as $car)
            <div class="cars">
                <a class="innerCars" href="{{ url('showcar/' . $car->id) }}" style="position:relative">
                    <div class="innerCarsTop">
                        @foreach ($car->items as $item)
                        @if($item->main == true)
                        <div class="img">
                            <img class="" src="{{ Storage::url($item->path) }}" />
                        </div>
                        @endif
                        @endforeach
                        @if ($car->car_soldOrBooked == 'Vendido')
                        <div class="state"><img class="" src="{{ Storage::url('img/sold.png') }}"></div>
                        @elseif ($car->car_soldOrBooked == 'Reservado')
                        <div class="state"><img class="" src="{{ Storage::url('img/reservedBg.png') }}"></div>
                        @else
                        <div class="state"><img class="" src="{{ Storage::url('img/onsale.png') }}"></div>
                        @endif
                    </div>
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
                @auth('web')
                <div class="edition">
                    <form method="POST" action="/updatestatus/{{ $car->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <select name="car_soldOrBooked" id="car_soldOrBooked">
                            <option value="En venta" @if ($car->car_soldOrBooked == 'En venta') selected="selected" @endif>En venta
                            </option>
                            <option value="Vendido" @if ($car->car_soldOrBooked == 'Vendido') selected="selected" @endif>Vendido
                            </option>
                            <option value="Reservado" @if ($car->car_soldOrBooked == 'Reservado') selected="selected" @endif>Reservado
                            </option>
                        </select><br>
                        <button class="blueButton text-white" type="submit">{{ Lang::get('car.car_changeStatus') }}</button>
                    </form>
                    <div class="editDelete">
                        <div class="edit"><button class="greenButton"><a class="text-white" href="{{ url('editcar/' . $car->id) }}">{{ Lang::get('car.editCar') }}</a></button>
                        </div>
                        <div class="delete"><button class="redButton"><a class="text-white" href="{{ url('deletecar/' . $car->id) }}">Eliminar</a></button>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection