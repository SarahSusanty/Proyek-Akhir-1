@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-images"></i></span><span>Galeri</span></h4>
        <p><a href="/admin/galeri">Galeri</a> / Contents /</p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h5>{{ $album->name }}</h5>
            <div class="garis-bawah"></div>
            <div class="set settings mt-minus">
                <button class="btn btn-info" value="videos"><i class="fas fa-video"></i> Video</button>
                <button class="btn btn-success" value="pictures"><i class="fas fa-image"></i> Gambar</button>
            </div>
            <hr>
            <div class="result">

            </div>
        </div>
        <a href="#" id="add" class="btn" data-placement="bottom" title="Tekan untuk menambahkan item"><i
                class="fas fa-plus"></i></a>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script>
        $idAlbum = {{ $idAlbum }};
        setGaleri('pictures');
        $('.set button').click(function() {
            setGaleri($(this).val());
        });

        function setGaleri(x) {
            // $('#add').attr('href', '/admin/galeri/addNew/' + x + '/' + $idAlbum);
            $.ajax({
                type: "GET",
                url: '/admin/galeri/' + x + '/' + $idAlbum,
                data: '',
                cache: false,
                success: function(data) {
                    $('.result').html(data);
                    // $(window).scrollTop(0);
                    // $index = 0;
                    // showDisplay($index);
                }
            });
        }
    $('#add').click(function() {
        window.open('/Files', 'popUpWindow', 'height=700,width=1000,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        return false;
    });
    function TakeData(data, table) {
        var tempt = "idFiles=" + data + "&idAlbum=" + $idAlbum;
        if (table == "videos") {
            setFile("/admin/galeri/addNew/videos", "", tempt, "POST");
            setGaleri('videos');
        } else {
            setFile("/admin/galeri/addNew/pictures", "", tempt, "POST");
            setGaleri('pictures');
        }
    }
    </script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            height: 400,
            filebrowserBrowseUrl: filemanager.ckBrowseUrl,
        });

    </script> --}}
@endsection
