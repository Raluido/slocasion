@extends('layouts.appNoAuth')

@section('content')
<div class="contact">
    <div class="wall">
        <img src="{{ Storage::url('/img/bgPanoramic.jpg') }}">
    </div>
    <div class="innerContact">
        <div class="title">
            <h3 class="">Contacta</h3>
        </div>
        @if ($errors->any())
        <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form class="" method="POST" action="/contact" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="inputForm">
                <input id="name" type="text" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="inputForm">
                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="inputForm">
                <input id="phone" type="number" placeholder="Teléfono" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="inputForm">
                <textarea class="form-control" id="" name="message" id="">Comentarios</textarea>
            </div>
            <div class="">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="" class="reload" id="reload">
                        ↻
                    </button>
                </div>
            </div>
            <div class="inputForm">
                <div class="">
                    <input id="captcha" placeholder="Introduce el captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                </div>
            </div>
            <div class="submitForm">
                <button class="blueButton text-white" type="submit" id="">Enviar</button>
            </div>
        </form>
    </div>
</div>
@if (!empty(($successMessage = \Illuminate\Support\Facades\Session::get('success'))))
<script>
    $(function() {
        if ($successMessage)
            alert('{{ $successMessage }}');
        endif
    });
</script>
@endif
<script type="text/javascript">
    $('#reload').click(function() {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function(data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endsection