@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comment"></i></span><span>Aspirasi</span></h4>
        <p>Aspirasi / </p>
    </div>
    <div class="content-right">
        <div class="columns flex-baru-row">
            <div class="bigContent">
                <h3>Semua Aspirasi</h3>
                <div class="right">
                    <select name="" id="" class="form-control" oninput="paginate('/admin/paginate/'+$(this).val()+'/aspirasi',$(this).val(), '1', $('.rowAspirasi'))">
                        <option value="all">Semua</option>
                        <option value="approved" >Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
                <div class="rowAspirasi mt-5">

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
        var type = 'all';
        paginate('/admin/paginate/'+type+'/aspirasi',type, '1', $('.rowAspirasi'));
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            paginate('/admin/paginate/'+type+'/aspirasi',type, page, $('.rowAspirasi'));
        });
    </script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script> --}}
@endsection
