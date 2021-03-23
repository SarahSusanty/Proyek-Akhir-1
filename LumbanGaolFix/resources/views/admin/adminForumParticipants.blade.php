@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comments"></i></span><span>Anggota Forum</span></h4>
        <p><a href="/admin/forum">Forum </a> / Anggota </p>
    </div>
    <div class="content-right">
        <div class="columns flex-baru-row">
            <div class="bigContent">
                <h5>Anggota {{ $forum->name }}</h5>
                <div class="form-group">
                    <input type="text" name="" id="" class="form-control" placeholder="Cari Anggota Disini" oninput="return liveSearch('/admin/forum/participants/row/{{ $forum->id }}', 1,$('.table-responsive'),key=$(this).val())">
                </div>
                <div class="table-responsive mt-4">

                </div>
            </div>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        var key = '';
        liveSearch('/admin/forum/participants/row/{{ $forum->id }}', 1,$('.table-responsive'),key);
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            liveSearch('/admin/forum/participants/row/{{ $forum->id }}', page,$('.table-responsive'),key);
        });
    </script>
@endsection
