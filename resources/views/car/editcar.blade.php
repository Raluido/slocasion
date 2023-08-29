@extends('layouts.appNoAuth')

@section('content')
<div class="container">
    <form method="POST" action="/updatecar/{{ $car->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6 mt-5">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="">
                    <label for="car_brand">{{ Lang::get('car.car_brand') }}</label><br>
                    <input type="text" id="car_brand" name="car_brand" value="{{ $car->car_brand }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_model">{{ Lang::get('car.car_model') }}</label><br>
                    <input type="text" id="car_model" name="car_model" value="{{ $car->car_model }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_color">{{ Lang::get('car.car_color') }}</label><br>
                    <input type="text" id="car_color" name="car_color" value="{{ $car->car_color }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_motorFuel">{{ Lang::get('car.car_motorFuel') }}</label><br>
                    <input type="text" id="car_motorFuel" name="car_motorFuel" value="{{ $car->car_motorFuel }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_cylinder">{{ Lang::get('car.car_cylinder') }}</label><br>
                    <input type="number" id="car_cylinder" name="car_cylinder" value="{{ $car->car_cylinder }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_doors">{{ Lang::get('car.car_doors') }}</label><br>
                    <input type="number" id="car_doors" name="car_doors" value="{{ $car->car_doors }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_gear">{{ Lang::get('car.car_gear') }}</label><br>
                    <input type="text" id="car_gear" name="car_gear" value="{{ $car->car_gear }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_body">{{ Lang::get('car.car_body') }}</label><br>
                    <input type="text" id="car_body" name="car_body" value="{{ $car->car_body }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_registration_date">{{ Lang::get('car.car_registration_date') }}</label><br>
                    <input type="date" id="car_registration_date" name="car_registration_date" value="{{ $car->car_registration_date }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_equipment">{{ Lang::get('car.car_equipment') }} Aaaaa, Bbbb, Cccc</label><br>
                    <textarea name="car_equipment" id="car_equipment" rows="7" cols="100"><?php echo $car_equipment; ?></textarea> <br>
                </div>
                <div class="mt-2">
                    <label for="car_photo">{{ Lang::get('car.car_photo_main') }}</label><br>
                    <input type="file" class="form-control" name="photoMain"><br>
                    <div class="thumbnail">
                        <img src="{{ Storage::url('media/' . $car->car_photo_main) }}" alt="" class="">
                    </div>
                    <div class="">
                        
                    </div>
                </div>
                <div class="d-flex mt2">
                    <div class="">
                        <label for="car_photo">{{ Lang::get('car.car_addPhoto') }}</label><br>
                        <input type="file" class="form-control" name="photos[]" multiple />
                        <div class="">
                            @foreach($items as $item)
                            <div class="thumbnail">
                                <img src="{{ Storage::url('media/' . str_replace('public/media/', '', $item->filename)) }}" alt="" class="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ms-5 mt-4"><button class="btn btn-danger"><a class="text-decoration-none text-white" href="{{ url('deleteallphotos/' . $car->id) }}">{{ Lang::get('car.car_deletePhotosButton') }}</a></button>
                    </div>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">{{ Lang::get('car.editCar') }}</button>
                </div>
            </div>
            <div class="col-6 mt-5">
                <div class="">
                    <label for="car_horsePower">{{ Lang::get('car.car_horsePower') }}</label><br>
                    <input type="number" id="car_horsePower" name="car_horsePower" value="{{ $car->car_horsePower }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_km">{{ Lang::get('car.car_km') }}</label><br>
                    <input type="number" id="car_km" name="car_km" value="{{ $car->car_km }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_numberPlate">{{ Lang::get('car.car_numberPlate') }} 0000AAA</label><br>
                    <input type="text" id="car_numberPlate" name="car_numberPlate" value="{{ $car->car_numberPlate }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_price">{{ Lang::get('car.car_price') }}</label><br>
                    <input type="number" id="car_price" name="car_price" value="{{ $car->car_price }}" required><br>
                </div>
                <div class="mt-2">
                    <label for="car_soldOrBooked">{{ Lang::get('car.car_soldOrBooked') }}</label><br>
                    <select name="car_soldOrBooked" id="car_soldOrBooked">
                        <option value="En venta" @if ($car->car_soldOrBooked == 'En venta') selected="selected" @endif>En venta
                        </option>
                        <option value="Vendido" @if ($car->car_soldOrBooked == 'Vendido') selected="selected" @endif>Vendido
                        </option>
                        <option value="Reservado" @if ($car->car_soldOrBooked == 'Reservado') selected="selected" @endif>Reservado
                        </option>
                    </select><br>
                </div>
                <div class="mb-2">
                    <label for="car_observations">{{ Lang::get('car.car_observations') }}</label><br>
                    <textarea name="car_observations" id="car_observations" rows="7" cols="100" required><?php echo $car_observations; ?></textarea><br>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection