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
                    @if(is_array($car))
                    <div class="innerImageCar"><img src="{{ Storage::url('media/' . $car->car_photo_main) }}" alt="" class=""></div>
                    @else
                    <div class="innerImageCar"><img src="{{ Storage::url('media/' . str_replace('public/media', '', $item->filename)) }}" alt="" class=""></div>
                    @endif
                    <div class="canva"></div>
                </div>
                <div class="cropOptions">
                    <div class="">
                        <label for="topHight" class="">Alto superior</label>
                        <label for="bottomHight" class="">Alto inferior</label>
                        <label for="leftWidth" class="">Ancho derecho</label>
                        <label for="rightWidth" class="">Ancho izquierdo</label>
                    </div>
                    <div class="">
                        <input type="range" class="">
                        <input type="range" class="">
                        <input type="range" class="">
                        <input type="range" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('js')
<script class="" src="{{ asset('js/editImages.js') }}"></script>
@endsection