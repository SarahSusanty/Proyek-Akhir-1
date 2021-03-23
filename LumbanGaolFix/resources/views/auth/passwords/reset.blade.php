@extends('layouts.defaulttwo')
@section('title', 'Login')
@section('edit-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
<div class="padding-default">
    <h3 class="center">Senang Bertemu Dengan Anda</h3>
    <p class="center">"Berhati-hatilah dengan keamanan akun anda !"</p>
    <div class="box-login">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <label for="password" class="col-form-label ">{{ __('Password') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group col-6">
                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn button-success">
                {{ __('Reset Password') }}
            </button>
        </form>
    </div>
</div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection
