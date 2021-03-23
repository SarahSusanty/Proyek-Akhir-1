@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-server"></i></span><span>Data Web</span></h4>
        <p><a href="/admin/Data">Data Web</a> / {{ $type }}</p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            @if ($type == 'links')
                <h3>Links</h3>
                @foreach ($data as $item)
                <?php
                    $tempt = explode('|', $item->information);
                ?>
                <div class="ListTempt">
                    <div class="listContent-big shadow clear">
                        <div class="setting">
                            <a href="/admin/Data/{{ $type }}/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                        <div class="headerList">
                            <h5>{{ $item->name }}</h5>
                        </div>
                        <div class="bodyList">
                            <ol>
                                @foreach ($tempt as $item2)
                                    <li>{!! $item2 !!}</li>
                                @endforeach
                            </ol>
                        <div class="note">
                            <h6>Note!</h6>
                            {!! $item->description !!}
                        </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                @endforeach
            @elseif ($type == 'slider')
            <h3>Slider</h3>
            @foreach ($data as $item)
            <?php
                $sliderSpef = [];
                $temp = explode("#",  $item->information);
                for ($i=0; $i < count($temp); $i++) {
                     $sliderSpef[$i] = explode("|", $temp[$i]);
                 }
                 $sliderPic =  explode("#", $item->picture);
            ?>
            <div class="ListTempt">
                <div class="listContent-big shadow clear">
                    <div class="setting">
                        <a href="/admin/Data/{{ $type }}/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    </div>
                    <div class="headerList">
                        <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="bodyList">
                        <ol>
                            @for ($i = 0; $i < count($temp); $i++)
                                <li>Judul : {!! $sliderSpef[$i][0] !!} <br />
                                    Desc : {!! $sliderSpef[$i][1] !!} <br />
                                    <img src="/uploads/img/AsetWeb/Carousel/{{ $sliderPic[$i] }}" alt="Gambar Slide" width="80%">
                                </li>
                            @endfor
                        </ol>
                    <div class="note">
                        <h6>Note!</h6>
                        {!! $item->description !!}
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @endforeach
            @elseif ($type == 'header')
            <h3>Header</h3>
                @foreach ($data as $item)
                <div class="ListTempt">
                    <div class="listContent-big shadow clear">
                        <div class="setting">
                            <a href="/admin/Data/{{ $type }}/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                        <div class="headerList">
                            <h5>{{ $item->name }}</h5>
                        </div>
                        <div class="bodyList">
                            <b>Header Text</b> : {!! $item->name !!} <br/>
                            <b>Description</b> : {!! $item->information !!}
                        <div class="note">
                            <h6>Note!</h6>
                            {!! $item->description !!}
                        </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                @endforeach
            @elseif ($type == 'text')
            @foreach ($data as $item)
            <div class="ListTempt">
                <div class="listContent-big shadow clear">
                    <div class="setting">
                        <a href="/admin/Data/{{ $type }}/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    </div>
                    <div class="headerList">
                        <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="bodyList">
                        {!! $item->information !!}<br/>
                    @if ($item->picture !== NULL)
                    <div class="lampiran">
                        <strong>Lampiran</strong><br>
                        <img src="/uploads/img/AsetWeb/{{ $item->picture }}" alt="Lampiran"  style="text-align: center;"><br>
                    </div>
                    @endif
                    <div class="note">
                        <h6>Note!</h6>
                        {!! $item->description !!}
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @endforeach
            @elseif ($type == 'logo')
            @foreach ($data as $item)
            <div class="ListTempt">
                <div class="listContent-big shadow clear">
                    <div class="setting">
                        <a href="/admin/Data/{{ $type }}/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    </div>
                    <div class="headerList">
                        <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="bodyList">
                        @if ($item->picture !== NULL)
                    <div class="lampiran">
                        <strong>Lampiran</strong><br>
                        <img src="/uploads/img/AsetWeb/{{ $item->picture }}" alt="Lampiran" width="100px" ><br>
                    </div>
                    @endif
                        {!! $item->information !!}
                    <div class="note">
                        <h6>Note!</h6>
                        {!! $item->description !!}
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @endforeach
            @elseif ($type == 'background')
            @foreach ($data as $item)
            <div class="ListTempt">
                <div class="listContent-big shadow clear">
                    <div class="setting">
                        <a href="/admin/Data/{{ $type }}/edit/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    </div>
                    <div class="headerList">
                        <h5>{{ $item->name }}</h5>
                    </div>
                    <div class="bodyList">
                        {!! $item->information !!}
                        <img src="/uploads/img/AsetWeb/{{ $item->picture }}" alt="Lampiran" width="70%" ><br>
                    <div class="note">
                        <h6>Note!</h6>
                        {!! $item->description !!}
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            @endforeach
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
    <script src="{{ asset('js/admin.js') }}" defer></script>
    {{-- <script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');

    </script> --}}
@endsection
