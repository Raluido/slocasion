@extends('layouts.appNoAuth')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
                    @endif
        <form class="d-flex justify-content-center pb-5" method="POST" action="/contact" enctype="multipart/form-data">
            <div class="w-50">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="">
                    <input id="name" type="text" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                </div>
                <div class="mt-5">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                </div>
                <div class="mt-5">
                    <input id="phone" type="number" placeholder="Teléfono" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                </div>
                <div class="mt-5">
                    <textarea class="form-control" id="" name="message" id="">Comentarios</textarea>
                </div>
                <div class="mt-5">
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                            ↻
                        </button>
                    </div>
                </div>
                <div class="mt-2">
                            <div class="">
                                <input id="captcha" placeholder="Introduce el captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            </div>
                </div>
                <div class="my-5 d-flex justify-content-center">
                    <button class="form-control btn btn-warning" type="submit" id="" style="width: 140px;">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    @if (!empty(($successMessage = \Illuminate\Support\Facades\Session::get('success'))))
        <script>
            $(function() {
                @if ($successMessage)
                    alert('{{ $successMessage }}');
                @endif
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
