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
            <h5>Lupa Password</h5>
            <small>Kami akan mengirimkan email kepada anda untuk melakukan perbuhan kata sandi.</small>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group ">
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
                <button type="submit" class="btn button-success">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection
