@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comments"></i></span><span>Forum Edit</span></h4>
        <p><a href="/admin/forum">Forum </a> / Edit </p>
    </div>
    <div class="content-right">
        <div class="columns flex-baru-row">
            <div class="bigContent">
                <h5>Buat Forum Baru</h5>
                <form action="/admin/forum/edit/store" method="post" enctype="multipart/form-data" onsubmit="return submitFormRedirect(this, '/admin/forum')">
                    <input type="hidden" name="idForum" value="{{ $forum->id }}">
                    <div class="form-group">
                        <label for="name">Nama Forum</label>
                        <input type="text" name="name" id="" class="form-control" required value="{{ $forum->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Deskripsi Forum</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" required >{{ $forum->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Logo</label><br>
                        <img src="/uploads/img/Forums/Logo/{{ $forum->logo }}" alt="asdasd" width="40%">
                        <div class="custom-file mb-3 mt-60">
                            <input type="file" class="custom-file-input" id="file" name="file" >
                            <input type="hidden" name="oldLogo" value="{{ $forum->logo }}">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success col-12">
                        <i class="fas fa-check-chircle"></i><span class='text-btn'>Simpan Perubahan</span>
                        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                        <span class='text-loading displayNone'> Sedang Menyimpan</span>
                    </button>
                </form>
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

    </script>
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');

    </script>
@endsection
