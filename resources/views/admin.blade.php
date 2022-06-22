@extends('layouts.app')

@section('content')
    <div>
        @auth
            <div class="container-fluid my-5" style="width:95%">
                <div class="mb-5">
                    <button class="btn btn-secondary" style="width:130px; height:40px"><a class="text-decoration-none text-white"
                            href="{{ url('/newcar') }}">{{ Lang::get('car.newCar') }}</a></button>
                </div>
                <div class="row">
                    @foreach ($cars->sortBy('car_SoldOrBooked') as $car)
                        <div class="col-12 col-md-6 col-lg-4">
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
                                    <form method="POST" action="/updatestatus/{{ $car->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex mt-4">
                                            <div class="">
                                                <select name="car_soldOrBooked" id="car_soldOrBooked">
                                                    <option value="En venta"
                                                        @if ($car->car_soldOrBooked == 'En venta') selected="selected" @endif>En venta
                                                    </option>
                                                    <option value="Vendido"
                                                        @if ($car->car_soldOrBooked == 'Vendido') selected="selected" @endif>Vendido
                                                    </option>
                                                    <option value="Reservado"
                                                        @if ($car->car_soldOrBooked == 'Reservado') selected="selected" @endif>Reservado
                                                    </option>
                                                </select><br>
                                            </div>
                                            <div class="ms-3">
                                                <button class="btn btn-warning"
                                                    type="submit">{{ Lang::get('car.car_changeStatus') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex justify-content-around my-5">
                                    <div class=""><button class="btn btn-primary"><a
                                                class="text-decoration-none text-white"
                                                href="{{ url('editcar/' . $car->id) }}">{{ Lang::get('car.editCar') }}</a></button>
                                    </div>
                                    <div class=""><button class="btn btn-danger"><a
                                                class="text-decoration-none text-white"
                                                href="{{ url('deletecar/' . $car->id) }}">Eliminar</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endauth
    </div>
@endsection
