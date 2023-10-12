@extends('layouts.appNoAuth')

@section('content')
<div class="login">
    <div class="innerLogin">
        <div class="title">
            <h3 class="">Acceso panel administrador</h3>
        </div>
        <form method="POST" action="{{ route('authenticate') }}">
            @csrf

            <div class="inputForm">
                <label for="email" class="">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="inputForm">
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            @error('password')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="margin10 d-flex justify-center">
                <input class="margin01" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="submitForm">
                <button type="submit" class="greenButton text-white">
                    {{ __('Login') }}
                </button>
            </div>
            @if (Route::has('password.request'))
            <a class="" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </form>
    </div>
</div>
@endsection