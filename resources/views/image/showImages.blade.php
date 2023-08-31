@extends('layouts.appNoAuth')

@section('content')

<div class="showImages">
    <div class="innerShowImages">
        <div class="top">
            <div class="title">
                <h3 class="">Galería de imágenes</h3>
            </div>
            <div class="description">
                <p class="">Haz click sobre la imagen que desees editar</p>
            </div>
        </div>
        <div class="bottom">
            <h4 class="">Foto principal</h4>
            <a href="{{ route('editimage', $car->car_photo_main) }}" class="">
                <div class="thumbnailImg"><img src="{{ Storage::url('media/' . $car->car_photo_main) }}" alt="" class=""></div>
            </a>
            <h4 class="">Otras</h4>
            <div class="thumbnails">
                @foreach($items as $item)
                <a href="{{ route('editimage', $item->idItem) }}" class="thumbnail">
                    <div class="thumbnailImg">
                        <img src="{{ Storage::url('media/' . str_replace('public/media/', '', $item->filename)) }}" alt="" class="">
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('js')
<script class="" src="{{ asset('js/editImages.js') }}"></script>
@endsection