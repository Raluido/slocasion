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
                        <label for="car_brand">{{ Lang::get('car.car_brand') }}</label>
                        <input type="text" id="car_brand" name="car_brand" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_model">{{ Lang::get('car.car_model') }}</label>
                        <input type="text" id="car_model" name="car_model" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_color">{{ Lang::get('car.car_color') }}</label>
                        <input type="text" id="car_color" name="car_color" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_motorFuel">{{ Lang::get('car.car_motorFuel') }}</label>
                        <input type="text" id="car_motorFuel" name="car_motorFuel" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_cylinder">{{ Lang::get('car.car_cylinder') }}</label>
                        <input type="number" id="car_cylinder" name="car_cylinder" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_doors">{{ Lang::get('car.car_doors') }}</label>
                        <input type="number" id="car_doors" name="car_doors" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_gear">{{ Lang::get('car.car_gear') }}</label>
                        <input type="text" id="car_gear" name="car_gear" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_body">{{ Lang::get('car.car_body') }}</label>
                        <input type="text" id="car_body" name="car_body" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_registration_date">{{ Lang::get('car.car_registration_date') }}</label>
                        <input type="date" id="car_registration_date" name="car_registration_date" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_equipment">{{ Lang::get('car.car_equipment') }}</label>
                        <textarea name="car_equipment" id="car_equipment" rows="7" cols="100" required></textarea>
                    </div>
                </div>
                <div class="">
                    <div class="inputForm">
                        <label for="car_horsePower">{{ Lang::get('car.car_horsePower') }}</label>
                        <input type="number" id="car_horsePower" name="car_horsePower" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_km">{{ Lang::get('car.car_km') }}</label>
                        <input type="number" id="car_km" name="car_km" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_numberPlate">{{ Lang::get('car.car_numberPlate') }} 0000ZZZ</label>
                        <input type="text" id="car_numberPlate" name="car_numberPlate" pattern="[0-9]{4}[A-Z]{3}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_price">{{ Lang::get('car.car_price') }}</label>
                        <input type="number" id="car_price" name="car_price" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_soldOrBooked">{{ Lang::get('car.car_soldOrBooked') }}</label>
                        <select name="car_soldOrBooked" id="car_soldOrBooked">
                            <option value="On sale">En venta</option>
                            <option value="Sold">Vendido</option>
                            <option value="Booked">Reservado</option>
                        </select>
                    </div>
                    <div class="inputForm">
                        <label for="car_observations">{{ Lang::get('car.car_observations') }}</label>
                        <textarea name="car_observations" id="car_observations" rows="7" cols="100" required></textarea>
                    </div>
                </div>
                <div class="inputForm">
                    <input type="file" name="addPhotosInput[]" class="addPhotosInput" id="addPhotosInput" multiple hidden>
                    <div class="addPhotosBtn grayButton text-white d-inline">Añadir fotos</div>
                </div>
                <div class="imgPrev">
                    <div class="innerImgPrev">
                        <div class="innerImgPrev">
                            <img src="{{ Storage::url('img/image-placeholder.png') }}" alt="" class="">
                        </div>
                        <div class="squareTemplate" id="squareTemplateId">
                            <div class="grabSquare" id="grabSquare"></div>
                            <div class="topTemplate"></div>
                            <div class="bottomTemplate"></div>
                            <div class="leftTemplate"></div>
                            <div class="rightTemplate"></div>
                        </div>
                    </div>
                    <div class="photoEdition d-flex justify-evenly">
                        <div class="mainCheckbox">
                            <label for="isMain" class="">Principal</label>
                            <input type="checkbox" class="" id="isMain">
                        </div>
                        <div class="cropDefaultReset margin10">
                            <div class="resetCrop">100 x 100</div>
                            <div class="defaultCrop">100 x 80</div>
                        </div>
                    </div>
                    <div class="changePhoto d-flex justify-center margin10">
                        <div class="previousPhoto">Anterior</div>
                        <div class="nextPhoto">Siguiente</div>
                    </div>
                </div>
                <input type="hidden" id="cropMeasures" name="cropMeasures" value="" class="">
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