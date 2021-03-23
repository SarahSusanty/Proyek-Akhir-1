@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comments"></i></span><span>Forum</span></h4>
        <p>Forum / </p>
    </div>
    <div class="content-right">
        <div class="columns flex-baru-row">
            <div class="bigContent">
                <h5>Semua Forum Anda</h5>
                <div class="form-group">
                    <input type="text" name="" id="" class="form-control" placeholder="Cari forum disini" oninput="return liveSearch('/admin/forum/row', 1,$('.rowForums'),key=$(this).val())">
                </div>
                <div class="rowForums">

                </div>
            </div>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="/js/admin.js"></script>
    <script>
        var pusher = new Pusher('25c86f0a2a94e2605ba3', {
        cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            liveSearch('/admin/forum/row', 1,$('.rowForums'),key);
        });
        var key = '';
        liveSearch('/admin/forum/row', 1,$('.rowForums'),key);
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            liveSearch('/admin/forum/row', page,$('.rowForums'),key);
        });
        function deleteForum(item) {
            if (confirm('Apakah anda akan menghapus forum ini ?')) {
                $.ajax({
                    type: 'get',
                    url: '/admin/forum/delete/' + $(item).attr('data-id'),
                    cache: false,
                    beforeSend: function(){
                        $(item).children().remove();
                        $(item).append("<span class='spinner-border'>")
                    },
                    complete: function(){
                        liveSearch('/admin/forum/row', 1,$('.rowForums'),key);
                    },
                    success: function() {

                    },
                    error: function(xhr,ajaxOptions, thrownError){
                        alert('Ada masalah saat menghapus, kode masalah : ' + xhr);
                    }
                });
            }
            return false;
        }
    </script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script> --}}
@endsection
