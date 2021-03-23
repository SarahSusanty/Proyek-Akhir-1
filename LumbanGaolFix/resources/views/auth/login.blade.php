@extends('layouts.defaulttwo')
@section('title', 'Login')
@section('edit-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
    <div class="padding-default">
        <h3 class="center">Senang Bertemu Dengan Anda</h3>
        <p class="center">"Mari masuk untuk mengutarakan pendapat anda"</p>
        <div class="box-login shadow">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h5>Masuk menggunakan Email dan Password</h5>
                <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-form-label ">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group remember">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <button type="submit" class="btn button-success ml-auto">
                        {{ __('Masuk') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
                <div class="other-way">
                    <h6>Atau Anda ingin Melanjutkan Dengan</h6>
                    <a href="{{ url('/auth/google') }}" style="margin-top: 20px;" class="btn button-google shadow-sm">
                        <i class="fab fa-google-plus-square"></i>
                        <strong>Google</strong>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection
