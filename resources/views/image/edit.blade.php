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
                    <canvas id="canvas"></canvas>
                </div>
                <div class="cropOptions">
                    <input type="range" name="topHight" value="0" min="0" max="100">
                    <label for="topHight" class="">Alto superior</label>
                    <input type="range" name="bottomHight" value="0" min="0" max="100">
                    <label for="bottomHight" class="">Alto inferior</label>
                    <input type="range" name="leftWidth" value="0" min="0" max="100">
                    <label for="leftWidth" class="">Ancho derecho</label>
                    <input type="range" name="rightWidth" value="0" min="0" max="100">
                    <label for="rightWidth" class="">Ancho izquierdo</label>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script class="" src="{{ asset('js/editImages.js') }}" defer></script>
@endsection