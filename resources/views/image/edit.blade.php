@extends('layouts.appNoAuth')

@section('content')

<div class="editImg">
    <div class="innerEditImg">
        <div class="top">
            <div class="title">
                <h3 class="">Edición de imágenes</h3>
            </div>
        </div>
        <div class="bottom">
            <h4 class="">Foto principal</h4>
            <a href="" class="">
                <div class="thumbnailImg"><img src="{{ Storage::url('media/' . $car->car_photo_main) }}" alt="" class=""></div>
            </a>
            <h4 class="">Otras</h4>
            <div class="thumbnails">
                @foreach($items as $item)
                <div class="thumbnail">
                    <div class="thumbnailImg">
                        <img src="{{ Storage::url('media/' . str_replace('public/media/', '', $item->filename)) }}" alt="" class="">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script class="" src="{{ asset('js/editImages.js') }}"></script>
@endsection