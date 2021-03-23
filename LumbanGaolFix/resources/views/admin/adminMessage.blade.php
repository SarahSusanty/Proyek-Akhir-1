@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h5><span><img src="/uploads/img/Forums/Logo/{{ $forums->logo }}" alt="" width="30px"></span><span>{{ $forums->name }}</span></h5>
        <p><a href="/admin/forum">Forum </a> / {{ $forums->name }} </p>
    </div>
    <div class="content-right">
        <div class="messages">
            <div style="margin: auto; width: 50%;text-align: center;">
                <span class="spinner-border"></span>
                <p>Sedang Mengambil Pesan</p>
            </div>

        </div>
        <div class="preview displayNone">
            <a href="" class="float-right mr-2 close">&times;</a>
            <div class="item">
                {{-- <img src="/uploads/img/Album/Lumban-Gaol_Foto-60316502-1608206409.jpg" alt="Priview"> --}}

            </div>
        </div>
        <div class="inputMessages">
            <a href="" onclick="return trigger($('input[name=document]'), 'click')"><i class="fas fa-file-alt"></i></a>
            <a href="" onclick="return trigger($('input[name=picture]'), 'click')"><i class="far fa-image"></i></a>
            <textarea name="" id="msg" placeholder="Ketikkan pesan anda disini....."></textarea>
            <a href="" onclick="return sendMessage({{ $forums->id }}, this)"><i class="fas fa-paper-plane"></i><span class="spinner-border text-primary displayNone"></span></a>
            <input type="file" name="picture" id="" class="displayNone">
            <input type="file" name="document" id="" class="displayNone">
        </div>
    </div>
    <div class="footer-right">
        <p>{!! $crfoot->information !!}</p>
    </div>
@endsection
@section('edit-js')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        var pusher = new Pusher('25c86f0a2a94e2605ba3', {
        cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if(data.forum == {{ $forums->id }}){
                getMessages({{ $forums->id }}, $('.messages'), 'yes');
            }
        });
         getMessages({{ $forums->id }}, $('.messages'));
         $('input[name=picture]').change(function(e){
            $('.content-right').animate({
                    scrollTop: ($('.content-right').get(0).scrollHeight)
                }, 50);
            $('input[name=document]').val('');
            $(this).parent().siblings('.preview').removeClass('displayNone');
            $(this).parent().siblings('.preview').children('.item').children().remove();
            $(this).parent().siblings('.preview').children('.item').append('<img src="" alt="preview">');
            readUrl(this, $(this).parent().siblings('.preview').children('.item').children('img'));
         });
         $('input[name=document]').change(function(e){
            $('.content-right').animate({
                    scrollTop: ($('.content-right').get(0).scrollHeight)
                }, 50);
            $('input[name=picture]').val('');
            $(this).parent().siblings('.preview').removeClass('displayNone');
            $(this).parent().siblings('.preview').children('.item').children().remove();
            $(this).parent().siblings('.preview').children('.item').append('<div class="itemFileM red shadow">' +
                // '<a href=""><i class="fas fa-download"></i></a>' +
                // '<i class="fas fa-file-pdf"></i>' +
                '<div class="spesifikasi">' +
                    '<span>'+$(this)[0].files[0].name+'</span><br>' +
                    '<small>Size : '+$(this)[0].files[0].size / 1000 +' Kb</small>' +
                '</div>' +
            '</div>');
            console.log($(this)[0].files[0].name.split('.').pop());
            if($(this)[0].files[0].name.split('.').pop() == 'pdf'){
                $('.spesifikasi').last().before('<i class="fas fa-file-pdf red"></i>');
            }
            else if($(this)[0].files[0].name.split('.').pop() == 'docx' || $(this)[0].files[0].name.split('.').pop() == 'doc'){
                $('.spesifikasi').last().before('<i class="fas fa-file-word blue"></i>');
            }
            else if($(this)[0].files[0].name.split('.').pop() == 'xlsx' || $(this)[0].files[0].name.split('.').pop() == 'xls' || $(this)[0].files[0].name.split('.').pop() == 'csv' ){
                $('.spesifikasi').last().before('<i class="fas fa-file-excel green"></i>');
            }
            else {
                $('.spesifikasi').last().before('<i class="fas fa-file-upload blueLight"></i>');
            }
            // readUrl(this, $(this).parent().siblings('.preview').children('.item').children('embed'));
         });
         $('.close').click(function(){
            $(this).parent().children('.item').children().remove();
            $('input[name=picture]').val('');
            $('input[name=document]').val('');
            $(this).parent().addClass('displayNone');
            return false;
         });
        function deleteMessage(item) {
            if (confirm('Apakah anda akan menghapus pesan ini ?')) {
                $.ajax({
                    type: 'post',
                    url: '/admin/forum/messages/delete/' + $(item).attr('data-id'),
                    cache: false,
                    beforeSend: function(){
                        $(item).children().remove();
                        $(item).append("<span class='spinner-border'>")
                    },
                    complete: function(){
                        getMessages({{ $forums->id }}, $('.messages'),'no','no');
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
