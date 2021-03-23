@extends('layouts.defaultthree')
@section('title', 'Pengunjung')
@section('edit-css')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comment"></i></span><span>Aspirasi</span></h4>
        <p>Aspirasi / </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h5>Semua Aspirasi</h5>
            <div class="right">
                <select name="" id="" class="form-control" oninput="paginate('/pengunjung/paginate/'+$(this).val()+'/aspirasi',$(this).val(), '1', $('.rowAspirasi'))">
                    <option value="all">Semua</option>
                    <option value="approved" >Disetujui</option>
                    <option value="rejected">Ditolak</option>
                    <option value="blocked">Dilarang</option>
                    <option value="waiting">Menunggu</option>
                </select>
            </div>
            <div class="rowAspirasi">

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
        var type = 'all';
        paginate('/pengunjung/paginate/all/aspirasi','all', '1', $('.rowAspirasi'));
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            paginate('/pengunjung/paginate/'+type+'/aspirasi',type, page,  $('.rowAspirasi'));
        });
    </script>
@endsection
