@extends('layouts.defaulttwo')
@section('title', 'Login')
@section('edit-css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
<div class="content-default">
    <h3 class="center">Senang Bertemu Dengan Anda</h3>
    <p class="center">"Mari masuk untuk mengutarakan pendapat anda"</p>
    <div class="box-login shadow">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('Sebuah link untuk memastikan akun anda telah kami kirimkan ke alamat email anda.') }}
            </div>
        @endif

        {{ __('Sebelum memulai tolong periksa email anda.') }}
        {{ __('Jika anda masih belum menerima pesan (Coba cek ke dalam spam) atau kirim ulang') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang Link Verifikasi') }}</button>.
        </form>
    </div>
</div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/auth.js') }}" defer></script>
@endsection
