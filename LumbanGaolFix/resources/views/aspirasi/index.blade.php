@extends('layouts.defaultone')
@section('title', 'Aspirasi')
@section('edit-css')
    <link rel="stylesheet" href="/css/aspirasi.css">
@endsection
@section('content')
    <div class="padding-default">
        <div class="headerPage" style="background: url({{ asset('uploads/img/AsetWeb/' . $bgHead->picture) }})"
            data-aos="fade-down">
            <h2>{{ $header->name }}</h2>
            {!! $header->information !!}
        </div>
        @if (Session::has('AspirasiCari'))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/aspirasi">Aspirasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cari</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Session::get('AspirasiCari') }}</li>
                </ol>
            </nav>
        @else
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Aspirasi</li>
                </ol>
            </nav>
        @endif
        <div class="contentRow">
            <div class="leftSide">
                <div class="contentLeft">
                    @if ($aspirasi[0] !== null)
                        @foreach ($aspirasi as $item)
                            <div class="listAspirasi shadow" data-aos="flip-down">
                                <div class="headerList">
                                    <img src="/uploads/img/UserProfile/{{ $item->profile }}" alt="User Profile">
                                    <h6>{{ $item->name }}</h6>
                                </div>
                                <h6>Topik : {{ $item->topic }}</h6>
                                <div class="bodyList">
                                    {!! $item->aspiration !!}
                                </div>
                                <div class="footerList">
                                    <a href="/aspirasi/tanggapan/{{ $item->id }}" class="btn button-info">Lihat
                                        Tanggapan</a><br />
                                    <small> Jumlah Tanggapan :
                                        @if ($item->Jumlah_Count)
                                            {{ $item->Jumlah_Count }}
                                        @else
                                            0
                                        @endif
                                    </small>
                                </div>
                                <small>{{ $item->created_at }}</small>
                                <div class="clear">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5>Tidak ada aspirasi ditemukan.</h5>
                    @endif
                    {{ $aspirasi->links() }}
                    <div class="listAspirasi shadow mt-80">
                        <div class="headerList">
                            <img src="/uploads/img/UserProfile/{{ Auth::user()->profile }}" alt="User Profile">
                            <h6>{{ Auth::user()->name }}</h6>
                        </div>
                        <div class="bodyList">
                            <form action="/aspirasi/kirim" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="topic" class="col-form-label">Topik</label>
                                    <input type="text" name="topic" id="" class="form-control" required placeholder="Masukkan Topik Aspirasi Anda">
                                </div>
                                <div class="form-group">
                                    <label for="content" class="col-form-label">Aspirasi</label>
                                    <textarea name="content" id="content" cols="30" rows="10" required placeholder="Masukkan Aspirasi Anda"></textarea>
                                </div>
                                <button type="submit" class="btn button-success">Kirim Aspirasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSide">
                <div class="boxSearch">
                    <form action="/aspirasi/cari" method="get" class="">
                        @csrf
                        <div class="bordered">
                            <input type="text" name="key" id="" placeholder="Cari informasi di sini">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="rekomendasi">
                    <h5>Rekomendasi</h5>
                    @foreach ($rekomendasi as $item)
                        <div data-aos="flip-right" class="listRekomendasi shadow-sm"
                            onclick="window.location.href='/aspirasi/tanggapan/{{ $item->id }}'">
                            <h6>{{ $item->topic }}</h6>
                            <small>{{ $item->created_at }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>{!! $crfoot->information !!}</p>
    </div>
@endsection

@section('edit-js')
    <script src="{{ asset('js/aspirasi.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script>
@endsection
