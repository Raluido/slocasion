@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/newcar" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 mb-5">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="mb-2">
                        <label for="car_brand">{{ Lang::get('car.car_brand') }}</label><br>
                        <input type="text" id="car_brand" name="car_brand" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_model">{{ Lang::get('car.car_model') }}</label><br>
                        <input type="text" id="car_model" name="car_model" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_color">{{ Lang::get('car.car_color') }}</label><br>
                        <input type="text" id="car_color" name="car_color" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_motorFuel">{{ Lang::get('car.car_motorFuel') }}</label><br>
                        <input type="text" id="car_motorFuel" name="car_motorFuel" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_cylinder">{{ Lang::get('car.car_cylinder') }}</label><br>
                        <input type="number" id="car_cylinder" name="car_cylinder" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_doors">{{ Lang::get('car.car_doors') }}</label><br>
                        <input type="number" id="car_doors" name="car_doors" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_gear">{{ Lang::get('car.car_gear') }}</label><br>
                        <input type="text" id="car_gear" name="car_gear" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_body">{{ Lang::get('car.car_body') }}</label><br>
                        <input type="text" id="car_body" name="car_body" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_registration_date">{{ Lang::get('car.car_registration_date') }}</label><br>
                        <input type="date" id="car_registration_date" name="car_registration_date" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_equipment">{{ Lang::get('car.car_equipment') }}</label><br>
                        <textarea name="car_equipment" id="car_equipment" rows="7" cols="100" required></textarea> <br>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-2">
                        <label for="car_horsePower">{{ Lang::get('car.car_horsePower') }}</label><br>
                        <input type="number" id="car_horsePower" name="car_horsePower" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_km">{{ Lang::get('car.car_km') }}</label><br>
                        <input type="number" id="car_km" name="car_km" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_numberPlate">{{ Lang::get('car.car_numberPlate') }} 0000ZZZ</label><br>
                        <input type="text" id="car_numberPlate" name="car_numberPlate" pattern="[0-9]{4}[A-Z]{3}"
                            required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_price">{{ Lang::get('car.car_price') }}</label><br>
                        <input type="number" id="car_price" name="car_price" required><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_soldOrBooked">{{ Lang::get('car.car_soldOrBooked') }}</label><br>
                        <select name="car_soldOrBooked" id="car_soldOrBooked">
                            <option value="On sale">En venta</option>
                            <option value="Sold">Vendido</option>
                            <option value="Booked">Reservado</option>
                        </select><br>
                    </div>
                    <div class="mb-2">
                        <label for="car_observations">{{ Lang::get('car.car_observations') }}</label><br>
                        <textarea name="car_observations" id="car_observations" rows="7" cols="100" required></textarea> <br>
                    </div>
                </div>
                <div class="col-12 row">
                    <div class="col-12">
                        <label for="car_photo">{{ Lang::get('car.car_photo_main') }}</label><br>
                    </div>
                    <div class="">
                        <input type="file" class="form-control" name="photoMain"><br>
                    </div>
                    <div class="col-12">
                        <label for="car_photo">{{ Lang::get('car.car_addPhoto') }}</label><br>
                    </div>
                    <div class="">
                        <input type="file" class="form-control" name="photos[]" multiple />
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <button>{{ Lang::get('car.newCar') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection













{{-- <div class="col-12 row mt-3">
                        <div class="col-3">
                            <input type="file" id="car_photo1" name="car_photo1"><br>
                            <input type="file" id="car_photo2" name="car_photo2"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo3" name="car_photo3"><br>
                            <input type="file" id="car_photo4" name="car_photo4"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo5" name="car_photo5"><br>
                            <input type="file" id="car_photo6" name="car_photo6"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo7" name="car_photo7"><br>
                            <input type="file" id="car_photo8" name="car_photo8"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo9" name="car_photo9"><br>
                            <input type="file" id="car_photo10" name="car_photo10"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo11" name="car_photo11"><br>
                            <input type="file" id="car_photo12" name="car_photo12"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo13" name="car_photo13"><br>
                            <input type="file" id="car_photo14" name="car_photo14"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo15" name="car_photo15"><br>
                            <input type="file" id="car_photo16" name="car_photo16"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo17" name="car_photo17"><br>
                            <input type="file" id="car_photo18" name="car_photo18"><br>
                        </div>
                        <div class="col-3">
                            <input type="file" id="car_photo19" name="car_photo19"><br>
                            <input type="file" id="car_photo20" name="car_photo20"><br>
                        </div>
                    </div> --}}
