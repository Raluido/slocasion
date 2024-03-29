@extends('layouts.appNoAuth')

@section('content')

<div class="editImage">
    <div class="innerEditImage">
        <div class="top">
            <div class="title">
                <h3 class="">Edición de imágenes</h3>
            </div>
        </div>
        <div class="bottom">
            <div class="innerBottom">
                <div class="imageCar">
                    @if(is_object($car))
                    <div class="innerImageCar"><img src="{{ Storage::url('media/' . $car->car_photo_main) }}" alt="" class=""></div>
                    @else
                    <div class="innerImageCar"><img src="{{ Storage::url('media/' . str_replace('public/media/', '', $item->filename)) }}" alt="" class=""></div>
                    @endif
                    <canvas id="canvas" width="311" height="264"></canvas>
                </div>
                <div class="cropOptions">
                    <input type="range" name="moveX" value="50" min="0" max="100">
                    <label for="moveX" class="">Izq | Dcha</label>
                    <input type="range" name="moveY" value="50" min="0" max="100">
                    <label for="moveY" class="">Arr | abjo</label>
                    <input type="range" name="sizeY" value="100" min="0" max="100">
                    <label for="sizeY" class="">Tamaño Vertical</label>
                    <input type="range" name="sizeX" value="100" min="0" max="100">
                    <label for="sizeX" class="">Tamaño Horizontal</label>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script class="" src="{{ asset('js/editImages.js') }}" defer></script>
@endsection