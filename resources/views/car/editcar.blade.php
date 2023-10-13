@extends('layouts.appNoAuth')

@section('content')
<div class="newCar">
    <div class="innerNewCar">
        <div class="top">
            <div class="wall">
                <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
            </div>
            <div class="title">
                <h3 class="">
                    Editar anuncio
                </h3>
            </div>
        </div>
        <div class="bottom">
            <form method="POST" action="/updatecar/{{ $car->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="inputForm">
                        <label for="car_brand">{{ Lang::get('car.car_brand') }}</label>
                        <input type="text" id="car_brand" name="car_brand" value="{{ $car->car_brand }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_model">{{ Lang::get('car.car_model') }}</label>
                        <input type="text" id="car_model" name="car_model" value="{{ $car->car_model }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_color">{{ Lang::get('car.car_color') }}</label>
                        <input type="text" id="car_color" name="car_color" value="{{ $car->car_color }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_motorFuel">{{ Lang::get('car.car_motorFuel') }}</label>
                        <input type="text" id="car_motorFuel" name="car_motorFuel" value="{{ $car->car_motorFuel }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_cylinder">{{ Lang::get('car.car_cylinder') }}</label>
                        <input type="number" id="car_cylinder" name="car_cylinder" value="{{ $car->car_cylinder }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_doors">{{ Lang::get('car.car_doors') }}</label>
                        <input type="number" id="car_doors" name="car_doors" value="{{ $car->car_doors }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_gear">{{ Lang::get('car.car_gear') }}</label>
                        <input type="text" id="car_gear" name="car_gear" value="{{ $car->car_gear }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_body">{{ Lang::get('car.car_body') }}</label>
                        <input type="text" id="car_body" name="car_body" value="{{ $car->car_body }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_registration_date">{{ Lang::get('car.car_registration_date') }}</label>
                        <input type="date" id="car_registration_date" name="car_registration_date" value="{{ $car->car_registration_date }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_equipment">{{ Lang::get('car.car_equipment') }} Aaaaa, Bbbb, Cccc</label>
                        <textarea name="car_equipment" id="car_equipment" rows="7" cols="100"><?php echo $car->car_equipment; ?></textarea>
                    </div>
                </div>
                <div class="">
                    <div class="inputForm">
                        <label for="car_horsePower">{{ Lang::get('car.car_horsePower') }}</label>
                        <input type="number" id="car_horsePower" name="car_horsePower" value="{{ $car->car_horsePower }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_km">{{ Lang::get('car.car_km') }}</label>
                        <input type="number" id="car_km" name="car_km" value="{{ $car->car_km }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_numberPlate">{{ Lang::get('car.car_numberPlate') }} 0000AAA</label>
                        <input type="text" id="car_numberPlate" name="car_numberPlate" value="{{ $car->car_numberPlate }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_price">{{ Lang::get('car.car_price') }}</label>
                        <input type="number" id="car_price" name="car_price" value="{{ $car->car_price }}" required>
                    </div>
                    <div class="inputForm">
                        <label for="car_soldOrBooked">{{ Lang::get('car.car_soldOrBooked') }}</label>
                        <select name="car_soldOrBooked" id="car_soldOrBooked">
                            <option value="En venta" @if ($car->car_soldOrBooked == 'En venta') selected="selected" @endif>En venta
                            </option>
                            <option value="Vendido" @if ($car->car_soldOrBooked == 'Vendido') selected="selected" @endif>Vendido
                            </option>
                            <option value="Reservado" @if ($car->car_soldOrBooked == 'Reservado') selected="selected" @endif>Reservado
                            </option>
                        </select>
                    </div>
                    <div class="inputForm">
                        <label for="car_observations">{{ Lang::get('car.car_observations') }}</label>
                        <textarea name="car_observations" id="car_observations" rows="7" cols="100" required><?php echo $car->car_observations; ?></textarea>
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
                    <div class="thumbnails">
                        @if(!empty($items[0]))
                        <div class="">
                            <p class="">Eliminar fotos</p>
                        </div>
                        @foreach($items as $item)
                        <div class="thumbnail">
                            <div class="thumbnailImg">
                                <img src="{{ Storage::url('media/' . str_replace('public/media/', '', $item->filename)) }}" alt="" class="">
                            </div>
                            <div class="thumbnailDelete">
                                <a href="{{ route('deleteImg', $item->idItem) }}" class="text-white">X</a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="editButton">
                        <button type="submit" class="greenButton text-white">{{ Lang::get('car.editCar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection