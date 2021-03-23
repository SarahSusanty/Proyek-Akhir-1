@extends('layouts.defaulttwo')
@section('title', 'Login')
@section('edit-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
<div class="padding-default">
    <h3 class="center">Senang Bertemu Dengan Anda</h3>
    <p class="center">"Satu Langkah Lagi Untuk Menjadi Bagian Kami."</p>
    <div class="box-login shadow">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="other-way m-1">
                <h5>Anda dapat langsung melanjutkan dengan</h5>
                <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn button-google shadow-sm">
                    <i class="fab fa-google-plus-square"></i>
                    <strong>Google</strong>
                </a>
            </div>
            <hr>

            <div class="form-group">
                <label for="name" class="col-form-label ">{{ __('Nama Lengkap') }}</label>

                <div class="">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label ">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

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
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group col-6">
                    <label for="password-confirm" class="col-form-label ">{{ __('Konfirmasi Password') }}</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn button-success col-12">
                {{ __('Daftarkan Saya') }}
            </button>
        </form>
    </div>
</div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection
