@extends('layouts.defaultone')
@section('title', 'Dashbord')
@section('edit-css')
    <link rel="stylesheet" href="/css/beranda.css">
@endsection
@section('content')
    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
        <ul class="carousel-indicators">
            @for ($i = 0; $i < count($sliderSpef); $i++)
            <li data-target="#demo" data-slide-to="{{$i}}" class="@if($i == 0)
             {{ __('active') }}
            @endif"></li>
        @endfor
        </ul>
        <div class="carousel-inner">
            @for ($i = 0; $i < count($sliderSpef); $i++)
                <div class="carousel-item">
                <img src="/uploads/img/AsetWeb/Carousel/{{ $sliderPic[$i] }}" alt="Los Angeles" width="100%"
                    height="">
                <h2 class="animasi-ketik">{!! $sliderSpef[$i][0] !!}</h2>
                <div class="carousel-caption">
                    <p>{!! $sliderSpef[$i][1] !!}</p>
                </div>
            </div>
            @endfor
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="padding-default content ">
        <div class="flex-baru-row">
            @foreach ($informasi as $item)
                <div class="list-information shadow" data-aos="flip-right">
                    <div class="img-display">
                        <img src="/uploads/img/Album/{{ $item->name }}" alt="Display Informasi">
                    </div>
                    <div class="des-information">
                        <h5>{{ $item->title }}</h5>
                        <p>{{ $item->description }}</p>
                        <a href="/informasi/baca/{{ $item->id }}" class="btn button-info">Lihat Informasi Lengkap</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="tentangDesa flex-baru-row-reverse shadow mt-80" data-aos="fade-up">
            <div class="img-kepalaDesa">
                <img src="/uploads/img/AsetWeb/{{ $sekilas->picture }}" alt="Kepala Desa">
            </div>
            <div class="text-tentangDesa">
                <h3>{{ $sekilas->name }}</h3>
                <div class="garis-bawah "></div>
                {!! $sekilas->information !!}
            </div>
        </div>

        <div class="alamat flex-baru-row-reverse mt-80 shadow" data-aos="zoom-in">
            <div class="iframe-peta">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7972.94270640077!2d99.09098957340706!3d2.3470219931579903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0406aef41841%3A0x885aae0453bd45fe!2sLumban%20Gaol%2C%20Balige%2C%20Kabupaten%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1605176771531!5m2!1sid!2sid" width="100%" frameborder="10vh" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="desc-alamat">
                <h3>{{ $temukan->name }}</h3>
                <div class="garis-bawah"></div>
                {!! $temukan->information !!}
            </div>
        </div>
    </div>
    <div class="footer mt-80">
        <div class="padding-default flex-baru-row">
            <div class="footer-item">
                <h3>{{ $tentang->name }}</h3>
                <div class="garis-bawah-putih"></div>
                <p>{!! $tentang->information !!}</p>
            </div>
            <div class="footer-item">
                <h3>Link Terkait</h3>
                <div class="garis-bawah-putih"></div>
                @foreach ($linkterkait as $item)
                    <?= $item?><br>
                @endforeach
            </div>
            <div class="footer-item">
                <img src="/uploads/img/AsetWeb/{{ $logolembaga->picture }}" alt="LogoDel">
                <img src="/uploads/img/AsetWeb/{{ $logoweb->picture }}" alt="LogoDesa">
            </div>
        </div>
        <p class="footer-copy">{!! $crfoot->information !!}</p>
    </div>
@endsection
@section('edit-js')
    <script src="{{ asset('js/beranda.js') }}" defer  ></script>
@endsection
