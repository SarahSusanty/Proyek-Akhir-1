@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-qrcode"></i></span><span>Informasi</span></h4>
        <p><a href="">Informasi</a> / Buat Informasi Baru </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h3>Buat Informasi Baru</h3>
            <div class="formInformasi">
                <form action="/admin/informasi/Edit/Save" method="post" enctype="multipart/form-data" onsubmit="return submitForm(this)">
                    @csrf
                    <input type="hidden" name="id" value="{{ $informasi->id }}">
                    <div class="form-group">
                        <label for="title">Judul Informasi</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="Judul Informasi" required value="{{ $informasi->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="idCategory" id="" class="form-control" required>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}"
                                    @if ($item->id == $informasi->idCategory)
                                        selected
                                    @endif>{{ $item->category }}</option>
                            @endforeach
                        </select>
                        <a href="#" data-toggle="modal" data-target="#myModal"> <i class="fas fa-plus-square"></i> Buat kategoi baru ?</a>
                    </div>
                    <div class="form-group">
                        <label for="">Tampilan Informasi</label><br>
                        <img src="/uploads/img/Album/{{ $informasi->name }}" alt="Priview" width="50%" id="imgDisplay"><br>
                        <a href="" id="selectDisplay" class="btn button-info mt-2"><i class="fas fa-plus-square"></i> Pilih Display</a>
                        <input type="hidden" name="idDisplay" value="{{ $informasi->idDisplay }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Deskripsi singkat</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" required>{{ $informasi->description }}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Informasi</label>
                        <textarea name="content" id="content" cols="30" rows="60" class="form-control">{{ $informasi->content }}</textarea>
                    </div>
                    <button type="submit" class="col-12 btn btn-success">
                        <i class="fas fa-check"></i><span class='text-btn'>Simpan Informasi</span>
                        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                        <span class='text-loading displayNone'>Sedang Menyimpan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="/category/New" method="post" onsubmit="return submitFormRedirect(this, '/admin/informasi/baru')">
                @csrf
                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="category" id="" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success col-12">
                    <i class="fas fa-check"></i> <span class='text-btn'>Tambahkan</span>
                    <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                    <span class='text-loading displayNone'>Sedang Menambahkan</span>
                </button>
              </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
    $('#selectDisplay').click(function() {
        window.open('/Files', 'popUpWindow', 'height=700,width=1000,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        return false;
    });
    function TakeData(data, table) {
        var tempt = "idFiles=" + data[0] + "&table=pictures";
        $.ajax({
            type: "POST",
            url: "/admin/takeByID",
            data: tempt,
            cache: false,
            success: function(data) {
                $('#imgDisplay').attr('src', '/uploads/img/Album/'+data.name);
                $('input[name=idDisplay]').val(data.id);
            }
        });
    }
    CKEDITOR.replace('content',
        {
            height: 400,
            filebrowserBrowseUrl: filemanager.ckBrowseUrl,
        }
    );
    CKEDITOR.replace('description',
        {
            height: 150,
            filebrowserBrowseUrl: filemanager.ckBrowseUrl,
        }
    );

    </script>
@endsection
