@extends('layouts.appNoAuth')

@section('content')
<div class="newCar">
    <div class="innerNewCar">
        <div class="top">
            <div class="wall">
                <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
            </div>
            <div class="title">
                <h3 class="">Añadir nuevo anuncio</h3>
            </div>
        </div>
        <div class="bottom">
            <form method="POST" action="/newcar" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="inputForm">
                        <label for="car_brand">{{ Lang::get('car.car_brand') }}</label><br>
                        <input type="text" id="car_brand" name="car_brand" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_model">{{ Lang::get('car.car_model') }}</label><br>
                        <input type="text" id="car_model" name="car_model" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_color">{{ Lang::get('car.car_color') }}</label><br>
                        <input type="text" id="car_color" name="car_color" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_motorFuel">{{ Lang::get('car.car_motorFuel') }}</label><br>
                        <input type="text" id="car_motorFuel" name="car_motorFuel" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_cylinder">{{ Lang::get('car.car_cylinder') }}</label><br>
                        <input type="number" id="car_cylinder" name="car_cylinder" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_doors">{{ Lang::get('car.car_doors') }}</label><br>
                        <input type="number" id="car_doors" name="car_doors" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_gear">{{ Lang::get('car.car_gear') }}</label><br>
                        <input type="text" id="car_gear" name="car_gear" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_body">{{ Lang::get('car.car_body') }}</label><br>
                        <input type="text" id="car_body" name="car_body" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_registration_date">{{ Lang::get('car.car_registration_date') }}</label><br>
                        <input type="date" id="car_registration_date" name="car_registration_date" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_equipment">{{ Lang::get('car.car_equipment') }}</label><br>
                        <textarea name="car_equipment" id="car_equipment" rows="7" cols="100" required></textarea> <br>
                    </div>
                </div>
                <div class="">
                    <div class="inputForm">
                        <label for="car_horsePower">{{ Lang::get('car.car_horsePower') }}</label><br>
                        <input type="number" id="car_horsePower" name="car_horsePower" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_km">{{ Lang::get('car.car_km') }}</label><br>
                        <input type="number" id="car_km" name="car_km" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_numberPlate">{{ Lang::get('car.car_numberPlate') }} 0000ZZZ</label><br>
                        <input type="text" id="car_numberPlate" name="car_numberPlate" pattern="[0-9]{4}[A-Z]{3}" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_price">{{ Lang::get('car.car_price') }}</label><br>
                        <input type="number" id="car_price" name="car_price" required><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_soldOrBooked">{{ Lang::get('car.car_soldOrBooked') }}</label><br>
                        <select name="car_soldOrBooked" id="car_soldOrBooked">
                            <option value="On sale">En venta</option>
                            <option value="Sold">Vendido</option>
                            <option value="Booked">Reservado</option>
                        </select><br>
                    </div>
                    <div class="inputForm">
                        <label for="car_observations">{{ Lang::get('car.car_observations') }}</label><br>
                        <textarea name="car_observations" id="car_observations" rows="7" cols="100" required></textarea> <br>
                    </div>
                </div>
                <div class="">
                    <input type="file" name="addPhotosInput[]" class="addPhotosInput" id="addPhotosInput" multiple hidden>
                    <div class="addPhotosBtn grayButton text-white d-inline">Añadir fotos</div>
                </div>
                <div class="imgPrev">
                    <div class="innerImgPrev">
                        <img src="{{ Storage::url('img/image-placeholder.png') }}" alt="" class="">
                    </div>
                </div>
                <div class="">
                    <label for="isMain" class="">Principal</label>
                    <input type="checkbox" class="" id="isMain">
                </div>
                <div class="changePhoto d-flex margin11">
                    <div class="previousPhoto">Anterior</div>
                    <div class="nextPhoto">Siguiente</div>
                </div>
                <div class="filters">
                    <div class="cropOptions d-flex">
                        <div class="cropTop grayButton text-white d-inline active" id="cropTop">Superior</div>
                        <div class="cropBottom grayButton text-white d-inline" id="cropBottom">Inferior</div>
                        <div class="cropLeft grayButton text-white d-inline" id="cropLeft">Izquierdo</div>
                        <div class="cropRight grayButton text-white d-inline" id="cropRight">Derecho</div>
                    </div>
                    <div class="cropRange">
                        <input type="range" class="">
                        <div class="name"></div>
                    </div>
                    <input type="hidden" id="cropMeasures" value="" class="">
                </div>
                <div class="submitForm">
                    <button class="greenButton text-white">{{ Lang::get('car.newCar') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script class="" src="{{ asset('js/editImages.js') }}" defer></script>
@endsection