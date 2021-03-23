@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-comment"></i></span><span>Aspirasi</span></h4>
        <p><a href="/admin/aspirasi">Aspirasi</a> / Aspirasi Dilarang</p>
    </div>
    <div class="content-right">
        <div class="columns flex-baru-row">
            <div class="bigContent">
                <h3>Semua Aspirasi</h3>

                <div class="rowAspirasi">
                    @foreach ($aspirations as $item)
                        <div class="listAspirasi shadow">
                            <div class="userInfo">
                                <img src="/uploads/img/UserProfile/{{ $item->profile }}" alt="">
                                <h6>{{ $item->name }}</h6>
                            </div>
                            <div class="aspirasi">
                                <h6>Topik: {{ $item->topic }}</h6>
                                {!! $item->aspiration !!}
                            </div>
                            @if ($item->status == 'approved')
                                <div class="approved">
                                    <i class="fas fa-check"></i>
                                    Diterima
                                </div>
                            @else
                                @if ($item->status == 'waiting')
                                    <div class="waiting">
                                        <i class="fas fa-stopwatch"></i>
                                        Menunggu
                                    </div>
                                @else
                                    @if ($item->status == 'rejected')
                                        <div class="rejected">
                                            <i class="fas fa-times-circle"></i>
                                            Ditolak
                                        </div>
                                    @else
                                        <div class="rejected">
                                            <i class="fas fa-ban"></i>
                                            Diblokir
                                        </div>
                                    @endif

                                @endif
                            @endif
                            <strong>{{ $item->created_at }}</strong>
                            <a href="#" class="btn btn-danger" onclick="return confirmAspirasi('batalkan',{{ $item->id }} ,'/admin/aspirasi/menunggu', this)">
                                <i class="fas fa-ban"></i> <span class='text-btn'>Batalkan Blokir</span>
                                <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                                <span class='text-loading displayNone'>Sedang Membatalkan Konfirmasi</span>
                            </a>
                            <div class="clear"></div>
                        </div>
                    @endforeach

                    {{ $aspirations->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-right">
        <p>{{ $crfoot->information }}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/admin.js') }}" defer></script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script> --}}
@endsection
