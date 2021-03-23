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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/aspirasi">Aspirasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tanggapan</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $aspirasi->topic }}</li>
            </ol>
        </nav>
        <div class="contentRow">
            <div class="leftSide">
                <div class="contentLeft">
                    <div class="listAspirasi shadow-sm" data-aos="fade-up">
                        <div class="headerList">
                            <img src="/uploads/img/UserProfile/{{ $aspirasi->profile }}" alt="User Profile">
                            <h6>{{ $aspirasi->name }}</h6>
                        </div>
                        <h6>Topik : {{ $aspirasi->topic }}</h6>
                        <div class="bodyList">
                            {!! $aspirasi->aspiration !!}
                        </div>
                        <div class="footerList">
                            <small> Jumlah Tanggapan :
                                @if ($aspirasi->Jumlah_Count)
                                    {{ $aspirasi->Jumlah_Count }}
                                @else
                                    0
                                @endif
                            </small>
                        </div>
                        <small>{{ $aspirasi->created_at }}</small>
                        <div class="clear">
                        </div>
                    </div>
                    <h5>Tanggapan</h5>
                    @foreach ($replays as $item)
                    <div class="listReplay shadow" data-aos="flip-right">
                        <div class="headerList">
                            <img src="/uploads/img/UserProfile/{{ $item->profile }}" alt="User Profile">
                            <h6>{{ $item->name }}</h6>
                        </div>
                        <div class="bodyList">
                            {!! $item->replay !!}
                        </div>
                        <small>{{ $item->created_at }}</small>
                        <div class="clear">
                        </div>
                    </div>
                    @endforeach
                    <div class="listAspirasi shadow mt-80">
                        <div class="headerList">
                            <img src="/uploads/img/UserProfile/{{ Auth::user()->profile }}" alt="User Profile">
                            <h6>{{ Auth::user()->name }}</h6>
                        </div>
                        <div class="bodyList">
                            <form action="/aspirasi/tanggapan/kirim" method="post">
                                @csrf
                                <input type="hidden" name="idAspirasi" value="{{ $aspirasi->id }}">
                                <div class="form-group">
                                    <label for="content" class="col-form-label">Tanggapan</label>
                                    <textarea name="content" id="content" cols="30" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn button-success">Kirim Tanggapan</button>
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
                        <div data-aos="flip-right" class="listRekomendasi shadow-sm" onclick="window.location.href='/aspirasi/tanggapan/{{ $item->id }}'">
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
