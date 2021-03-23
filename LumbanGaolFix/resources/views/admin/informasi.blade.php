@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-qrcode"></i></span><span>Informasi</span></h4>
        <p>Informasi / </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h6>Semua Informasi</h6>
            <button class="btn btn-danger mb-3" onclick="return deleteInformation(this)">
                <i class="fas fa-trash-alt"></i> <span class='text-btn'>Hapus Yang Ditandai</span>
                <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                <span class='text-loading displayNone'>Sedang Menghapus</span>
            </button>
            <div class="right" style="width: 60%;margin-top: 0px">
                <div class="form-group">
                    <input type="text" name="" id="" class="form-control" placeholder="Cari informasi disini" oninput="return liveSearch('/admin/informasi/row', 1,$('.table-responsive'),key=$(this).val())">
                </div>
            </div>
            <div class="table-responsive mt-4">

            </div>
           <div class="showImg visibility shadow">
            <img src="" alt="" width="100%">
            </div>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script>
        var key = '';
        liveSearch('/admin/informasi/row', 1,$('.table-responsive'),key);
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            liveSearch('/admin/informasi/row', page,$('.table-responsive'),key);
        });
    </script>
@endsection
