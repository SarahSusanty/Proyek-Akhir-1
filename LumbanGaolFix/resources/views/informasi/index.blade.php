@extends('layouts.defaultone')
@section('title', 'Informasi')
@section('edit-css')
    <link rel="stylesheet" href="/css/informasi.css">
@endsection
@section('content')
<div class="padding-default">
    <div class="headerPage" style="background: url({{ asset('uploads/img/AsetWeb/'.$bgHead->picture) }})" data-aos="fade-down">
        <h2>{{ $header->name }}</h2>
        {!! $header->information !!}
    </div>
    @if (Session::has('InformasiCari'))
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/informasi">Informasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cari</li>
                </ol>
            </nav>
        @else
            @if (Session::has('InformasiKategori'))
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/informasi">Informasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Session::get('InformasiKategori') }}</li>
                    </ol>
                </nav>
            @else
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                    </ol>
                </nav>
            @endif
        @endif
    <div class="contentRow">
        <div class="leftSide">
            <div class="contentLeft">
                @if (Session::has('InformasiCari'))
                    <h5>Key : {{ Session::get('InformasiCari') }}</h5>
                @endif
                @if ($informasi[0] !== Null)
                @foreach ($informasi as $item)
                <div class="listInformasi shadow" data-aos="flip-left">
                    <div class="displayImg">
                        <img src="/uploads/img/Album/{{ $item->name }}" alt="">
                    </div>
                    <h4>{{ $item->title }}</h4>
                    <div class="garis-bawah"></div>
                    <div class="decTetx">
                        {!! $item->description !!}
                    </div>
                    <a href="/informasi/baca/{{ base64_encode($item->id) }}" class="btn button-info">Baca Informasi</a>
                    <small>{{ $item->created_at }}</small>
                </div>
                @endforeach
                @else
                    <strong>Tidak Ada Informasi Ditemukan !</strong>
                @endif
                {{ $informasi->links() }}
            </div>
        </div>
        <div class="rightSide">
            <div class="boxSearch">
                <form action="/informasi/cari/" method="get">
                    <input type="text" name="key" id="" placeholder="Cari informasi di sini">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="rekomendasi">
                <h5>Sering Dibaca</h5>
                @foreach ($rekomendasi as $item)
            <div class="listRekomendasi shadow" data-aos="flip-down" onclick="window.location.href='/informasi/baca/{{ base64_encode($item->id) }}'">
                    <div class="miniDisplay">
                        <img src="/uploads/img/Album/{{ $item->name }}" alt="">
                    </div>
                    <div class="desc">
                        <h6>{{ $item->title }}</h6>
                        <small>{{ $item->created_at }}</small>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="category">
                <h5>Kategori</h5>
                @foreach ($category as $item)
                    <a href="/informasi/category/{{ base64_encode($item->id) }}">{{ $item->category }} (@if ($item->jumlah > 0)
                        {{ $item->jumlah }}
                    @else
                        0
                    @endif)</a>
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
    <script src="{{ asset('js/informasi.js') }}" defer  ></script>
@endsection
