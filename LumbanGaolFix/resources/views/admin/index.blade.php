@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
<div class="header-right shadow-sm">
    <h4><span><i class="fas fa-tachometer-alt"></i></span><span>Dashboard</span></h4>
    <p>Dashboard / </p>
</div>
<div class="content-right">
    <div class="columns flex-baru-row">
        <div class="items shadow color1">
            <h6><i class="fa fa-users"></i> Users</h6>
            <p>{{ $users }} users</p>
        </div>
        <div class="items shadow color2">
            <h6><i class="fas fa-qrcode"></i> Informasi Desa</h6>
            <p>{{ $information}} Informasi</p>
        </div>
        <div class="items shadow color3">
            <h6><i class="fas fa-comment"></i> Aspirasi</h6>
            <p>{{ $aspirations }} aspirasi</p>
        </div>
        <div class="items shadow color4">
            <h6><i class="fas fa-comments"></i> Forum</h6>
            <p>{{ $forums }} Forum</p>
        </div>
    </div>
    <div class="midContent">
        <h3>Selamat Datang</h3>
        {!! $welcome->information !!}
    </div>
</div>
<div class="footer-right">
    <p>{{ $crfoot->information }}</p>
</div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script> --}}
@endsection
