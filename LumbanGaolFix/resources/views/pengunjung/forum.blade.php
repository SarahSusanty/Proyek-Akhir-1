@extends('layouts.defaultthree')
@section('title', 'Pengunjung')
@section('edit-css')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comments"></i></span><span>Forum</span></h4>
        <p>Forum / </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h5>Semua Forum Anda</h5>
            <div class="form-group">
                <input type="text" name="" id="" class="form-control" placeholder="Cari forum disini" oninput="return liveSearch('/pengunjung/liveSearchForum', 1,$('.rowForums'),key=$(this).val())">
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
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        var pusher = new Pusher('25c86f0a2a94e2605ba3', {
        cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            liveSearch('/pengunjung/liveSearchForum', 1,$('.rowForums'),key);
        });
        var key = '';
        liveSearch('/pengunjung/liveSearchForum', 1,$('.rowForums'),key);
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            liveSearch('/pengunjung/liveSearchForum', page,$('.rowForums'),key);
        });
    </script>
@endsection
