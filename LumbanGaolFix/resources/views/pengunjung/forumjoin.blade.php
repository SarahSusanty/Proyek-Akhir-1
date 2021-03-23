@extends('layouts.defaultthree')
@section('title', 'Pengunjung')
@section('edit-css')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comments"></i></span><span>Forum</span></h4>
        <p><a href="/pengunjung/forum">Forum</a> / Join </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h5>Semua Forum</h5>
            <div class="form-group">
                <input type="text" name="" id="" class="form-control" placeholder="Cari forum disini" oninput="return liveSearch('/pengunjung/liveSearchForumJoin', 1,$('.rowForums'),key=$(this).val())">
            </div>
            <div class="rowForums">

            </div>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        var key = '';
        liveSearch('/pengunjung/liveSearchForumJoin', 1, $('.rowForums'),key);
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            liveSearch('/pengunjung/liveSearchForumJoin', page, $('.rowForums'),key);
        });
    </script>
@endsection
