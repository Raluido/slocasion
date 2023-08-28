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
                @error('email')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="inputForm">
                <label for="password" class="">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="inputForm">
                <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="submitForm">
                <button type="submit" class="">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection