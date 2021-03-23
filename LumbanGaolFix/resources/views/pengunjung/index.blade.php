@extends('layouts.defaultthree')
@section('title', 'Pengunjung')
@section('edit-css')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-tachometer-alt"></i></span><span>Dashboard</span></h4>
        <p>Dashboard / </p>
    </div>
    <div class="content-right">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="midContent shadow-sm">
            <h3>Selamat Datang</h3>
            {!! $welcome->information !!}
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
@endsection
