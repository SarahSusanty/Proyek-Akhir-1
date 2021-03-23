@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-server"></i></span><span>Data Web</span></h4>
        <p><a href="/admin/Data">Data Web</a> / <a href="/admin/Data/{{ $type }}">{{ $type }}</a> / Edit</p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            @if ($type == 'links')
                <h6>{{ $data->name }}</h6>
                {!! $data->information !!}
                <div class="tempt">

                </div>
                <a href="#" onclick="return addLinksItem()" class="float-right"><i class='fas fa-plus mt-3 '></i> Tambah Link Baru</a><br>
                <button id="button-send" class='btn button-success' onclick='return createLinkText("{{  $type }}", {{ $data->id }})'>
                    <i class="fas fa-check"></i> <span class='text-btn'>Simpan</span>
                    <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                    <span class='text-loading displayNone'>Sedang Menyimpan Perubahan</span>
                </button>
            @elseif ($type == 'slider')
            <?php
                $sliderSpef = [];
                $temp = explode("#",  $data->information);
                for ($i=0; $i < count($temp); $i++) {
                    $sliderSpef[$i] = explode("|", $temp[$i]);
                }
                $sliderPic =  explode("#", $data->picture);
            ?>
           <div class="tempt">
            @for ($i = 0; $i < count($temp); $i++)
            <div class="slider-item mb-5 shadow p-3">
                <a href="" class="a-danger float-right" onclick='return dropSlider($(this).parent().index())'><i class="fas fa-trash-alt"></i>  Buang Item</a>
                <div class="form-group">
                    <label for="">Judul Slider</label>
                    <input type="text" name=""  class="form-control" value="{{ $sliderSpef[$i][0] }}">
                    <label for="">Deskripsi/tag</label>
                    <textarea name="editor{{ $i }}" rows="5" class="form-control editor">{{ $sliderSpef[$i][1] }}</textarea>
                </div>
                <div class="slider-Img" style="width: 80%;">
                    <img src="/uploads/img/AsetWeb/Carousel/{{ $sliderPic[$i] }}" alt="Preview" width="100%">
                    <input type="hidden" name="oldName{{$i}}" value="{{$sliderPic[$i]}}">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile{{$i}}">
                        <label class="custom-file-label" for="customFile{{$i}}">Choose file</label>
                      </div>
                </div>
                <button class="btn btn-success mt-2" onclick='return slider(this)' >
                    <i class="fas fa-check"></i> <span class='text-btn'>Simpan</span>
                    <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                    <span class='text-loading displayNone'>Sedang Menyimpan</span>
                </button>
                <p class="float-right displayNone" >Tersimpan</p>
            </div>
            @endfor
           </div>
            <button class="btn btn-success" onclick="return TerapkanSlider({{ $data->id }}, this)">
                <i class="fas fa-check"></i> <span class='text-btn'>Terapkan Perubahan</span>
                <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                <span class='text-loading displayNone'>Sedang Menerapkan</span>
            </button>
            <a href="" class="float-right mt-2" onclick="return addNewSlider()"><i class="fas fa-plus "></i> Tambahkan Slider Baru</a>
            @elseif ($type == 'header')
                <div class="temp">
                   <form action="/admin/Data/header/edit/{{ $data->id }}/save" method="post" onsubmit="return submitForm(this)">
                    @csrf
                    <div class="form-group">
                        <label for="name">Text Header</label>
                        <input type="text" name="name" id="" class="form-control" value="{{ $data->name }}">
                        <label for="information" class="mt-2">Header Description</label>
                        <textarea name="information" id="" cols="30" rows="10">{{ $data->information }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> <span class='text-btn'>Simpan</span>
                        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                        <span class='text-loading displayNone'>Sedang Menyimpan Perubahan</span>
                    </button>
                   </form>
                </div>
            @elseif ($type == 'text' || $type == 'logo' || $type == 'background')
                <div class="temp">
                   <form action="/admin/Data/text/edit/{{ $data->id }}/save" method="post" onsubmit="return submitForm(this)">
                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input type="text" name="name" id="" class="form-control" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="information">Isi Informasi</label>
                        <textarea name="information" id="" class="form-control">{{ $data->information }}</textarea>
                    </div>
                    <div class="Lampiran" style="width: 50%;">
                        <img src="/uploads/img/AsetWeb/{{ $data->picture }}" alt="" width="100%">
                        <input type="hidden" name="oldFile" value="{{ $data->picture }}">
                        <div class="custom-file">
                            <input type="file" name="file" id="file" class="custom-file-input">
                            <label class="custom-file-label" for="">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">
                        <i class="fas fa-check"></i> <span class='text-btn'>Simpan</span>
                        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                        <span class='text-loading displayNone'>Sedang Menyimpan Perubahan</span>
                    </button>
                   </form>
                </div>
            @else
                Tidak Ditemukan
            @endif
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/admin.js') }}"></script>
    @if ($type == 'links')
    <script>
        LinksItem();
    </script>
    @elseif ($type == 'slider')
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
    var ArrayResult = new Array();
    CKEDITOR.disableAutoInline = false;
    var dd=0;
    $(".editor").each(function(){
          $(this).attr("id","editor"+dd);
          CKEDITOR.replace( 'editor'+dd);
          dd=dd+1;
    });
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
    @elseif ($type == 'header')
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('information');
    </script>
    @elseif ($type == 'text' || $type == 'logo' || $type == 'background')
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('information',{
            height: 200
        });
    </script>
    @else
        Tidak Ditemukan
    @endif
@endsection
