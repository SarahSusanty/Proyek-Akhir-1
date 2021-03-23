@extends('layouts.defaultthree')
@section('title', 'Pengunjung')
@section('edit-css')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comment"></i></span><span>Aspirasi</span></h4>
        <p><a href="/pengunjung/aspirasi">Aspirasi</a> / Edit Aspirasi </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h5>Ubah Aspirasi</h5>
            <form action="/pengunjung/aspirasi/edit/Store" method="post" onsubmit="return submitFormRedirect(this, '/pengunjung/aspirasi')">
                @csrf
                <input type="hidden" name="idAspirasi" value="{{ $aspirasi->id }}">
                <div class="form-group">
                    <label for="topic" class="col-form-label">Topik</label>
                    <input type="text" name="topic" id="" class="form-control" required placeholder="Masukkan Topik Aspirasi Anda" value="{{ $aspirasi->topic }}">
                </div>
                <div class="form-group">
                    <label for="content" class="col-form-label">Aspirasi</label>
                    <textarea name="content" id="content" cols="30" rows="10" required placeholder="Masukkan Aspirasi Anda" >{{ $aspirasi->aspiration }}</textarea>
                </div>
                <button type="submit" class="btn btn-success col-12">
                    <i class="fas fa-check"></i> <span class='text-btn'>Simpan Perubahan</span>
                    <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                    <span class='text-loading displayNone'>Sedang Menyimpan</span>
                </button>
            </form>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script>
@endsection
