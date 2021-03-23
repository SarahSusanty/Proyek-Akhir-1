@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-images"></i></span><span>Galeri</span></h4>
        <p>Galeri /  </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <label for=""><input type="checkbox" name="" id="" onclick="check_uncheck_checkbox(this.checked, 'idAlbums')" > Tandai Semua</label>
            <div class="settings mb-3">
                <button class="btn btn-danger delete-Album" id="delete-Album"><i class="fas fa-trash-alt"></i> Hapus</button>
            </div>
            <hr>
            <div class="rowFiles mt-3">
               @foreach ($albums as $item)
               <div class="file shadow" data-toggle="popover" title="Klik untuk melihat isi album" data-trigger="hover" data-content="{{ $item->description }}">
                <div class="fileSetting">
                    <input type="checkbox" name="idAlbums" value="{{ $item->id }}">
                    <a data-idAlbum="{{ $item->id }}" href="" class="editAlbum" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"> Edit</i></a>
                </div>
                <div  onclick="window.location.href = '/admin/galeri/contents/{{ $item->id }}'">
                    <img src="{{ $item->location.$item->picture }}" alt="Display">
                <p>{{ $item->name }}</p>
                <div class="fileSpek">
                    <strong>Gambar : {{ $item->count_picture }} </strong><br>
                    <strong>Video : {{ $item->count_video }} </strong>
                </div>
                <small>{{ $item->created_at }}</small>
                </div>
            </div>
               @endforeach
            </div>
            {{ $albums->links() }}
        </div>
        <a href="#" data-toggle="modal"  data-target="#myModal" id="add"  class="btn" data-placement="bottom" title="Tekan untuk menambahkan item"><i class="fas fa-plus"></i></a>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Album</h4>
              <a type="button" class="close" data-dismiss="modal">&times;</a>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="/admin/galeri/addAlbum" method="post" id="form-Album">
                  @csrf
                  <div class="form-group">
                    <label for="">Nama File</label>
                      <input type="text" name="fileName" id="fileName" class="form-control" placeholder="File Name">
                  </div>
                  <div class="form-group">
                    <label for="">Deskripsi Singkat</label>
                    <textarea name="Desc" id="Desc" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="FileSelect">
                    <div class="preview shadow-sm">
                        <img src="" alt="Priview">
                    </div>
                    <a href="#" class="selectFile">Pilih Display</a>
                    <input type="hidden" name="idDisplay" id="idDisplay">
                  </div>
                  <button type="submit" class="btn btn-success mt-3" name="idAlbum" id="idAlbum">Buat Album</button>
              </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
@endsection
@section('edit-js')
    <script>
    $('.selectFile').click(function() {
        window.open('/Files', 'popUpWindow', 'height=700,width=1000,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        return false;
    });
    function TakeData(data, table) {
        var tempt = "idFiles=" + data[0] + "&table=" + table;
        $.ajax({
            type: "POST",
            url: "/admin/takeByID",
            data: tempt,
            cache: false,
            success: function(d){
                $('.preview>img').attr('src', d.location + d.name);
                $('#idDisplay').val(d.id);
            }
        })
    }
    </script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content',
            {
                height: 400,
                filebrowserBrowseUrl: filemanager.ckBrowseUrl,
            }
        );

    </script> --}}
@endsection
