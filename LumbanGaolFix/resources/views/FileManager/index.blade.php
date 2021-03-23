@extends('layouts.filemanager')
@section('title', 'File Manager')
@section('edit-css')
    <link rel="stylesheet" href="/css/file.css">
@endsection
<div class="header shadow-sm">
    <img src="/uploads/img/AsetWeb/FileManager-Logo.png" alt="Logo">
    <h3>File Manager</h3>
</div>
<div class="wrap">
    <div class="wrapSidebar">
        <div class="folderList">
            <div class="folder hover foto pictures">
                <img src="/uploads/img/AsetWeb/FileManager-IconFoto.png" alt="">
                <div class="folderName">
                    Foto
                </div>
            </div>
            <div class="folder hover video videos">
                <img src="/uploads/img/AsetWeb/FileManager-IconVideo.png" alt="">
                <div class="folderName">
                    Video
                </div>
            </div>
        </div>
        <div class="addFiles">
            <div class="addFile">
                <h5><i class="fas fa-plus"></i> Tambah Gambar</h5>
                <form action="" method="post" enctype="multipart/form-data" id="form-AddFoto">
                    <input type="file" name="foto[]" id="foto" class="visibility" multiple>
                    <button type="submit" id="btn_foto" class="visibility"></button>
                </form>
            </div>
            <div class="addFile">
                <h5><i class="fas fa-plus"></i> Tambah Video</h5>
                <form action="" method="post" enctype="multipart/form-data" id="form-AddVideo">
                    <input type="file" name="video" id="video" class="visibility">
                    <button type="submit" id="btn_video" class="visibility"></button>
                </form>
            </div>
        </div>
        <div class="status visibility  mt-5"></div>
        <div class="progress visibility">
            <div class="progress-bar" style="width:0%">0%</div>
        </div>
        <a href="#" class="btn btn-danger visibility mt-4" id="batalkanUpload"><i class="fas fa-times"></i> Batalkan</a>
    </div>
    <div class="wrapContent">
        <div class="loading">
            <div class="iconLoading">
                <img src="/uploads/img/AsetWeb/FileManager-Loading.gif" alt="">
                <p>Sedang mengambil file anda</p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th style="width: 40px;"><input type="checkbox" name="" id=""
                            onclick="check_uncheck_checkbox(this.checked, 'idFiles')"></th>
                    <th style="width: 50%;">Nama File</th>
                    <th style="width: 170px;">Ditambahkan Pada</th>
                    <th style="width: calc(50%-190px);">
                        <a href="" class="btn btn-info mr-2" id="addAll">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a href="#" id="deleteAll" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">Silahkan Pilih File</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@section('content')
@endsection
@section('edit-js')
    <script>
        $('.addFile').click(function() {
            $(this).find("input[type='file']").trigger('click');
        });
        $('input[name="foto[]"]').on('input', function() {
            $('#btn_foto').trigger('click');
        });
        $('input[name="video"]').on('input', function() {
            $('#btn_video').trigger('click');
        });

    </script>
    <script src="{{ asset('js/file.js') }}" defer></script>
@endsection
