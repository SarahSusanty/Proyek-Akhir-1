@extends('layouts.defaultfour')
@section('title', 'Admin')
@section('edit-css')
    <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('content')
    <div class="header-right shadow-sm">
        <h4><span><i class="fas fa-server"></i></span><span>Data Web</span></h4>
        <p>Data Web / </p>
    </div>
    <div class="content-right">
        <div class="bigContent">
            <h5>Lakukan perubahan web dengan memilih menu di bawah!</h5>
            <div class="rowTypes">
                <div class="listType color1 shadow-sm" onclick="return redirect('/admin/Data/{{ $type[0]->type }}', false)">
                    <i class="fas fa-link"></i>
                    {{ $type[0]->type }}
                </div>
                <div class="listType color2 shadow-sm" onclick="return redirect('/admin/Data/{{ $type[1]->type }}',false)">
                    <i class="fas fa-sliders-h"></i>
                    {{ $type[1]->type }}
                </div>
                <div class="listType color3 shadow-sm"  onclick="return redirect('/admin/Data/{{ $type[2]->type }}', false)">
                    <i class="fas fa-heading"></i>
                    {{ $type[2]->type }}
                </div>
                <div class="listType color4 shadow-sm"  onclick="return redirect('/admin/Data/{{ $type[3]->type }}', false)">
                    <i class="fas fa-file-alt"></i>
                    {{ $type[3]->type }}
                </div>
                <div class="listType color5 shadow-sm"  onclick="return redirect('/admin/Data/{{ $type[4]->type }}', false)">
                    <i class="fab fa-reddit"></i>
                    {{ $type[4]->type }}
                </div>
                <div class="listType color6 shadow-sm"  onclick="return redirect('/admin/Data/{{ $type[5]->type }}', false)">
                    <i class="fas fa-image"></i>
                    {{ $type[5]->type }}
                </div>
            </div>
            <div class="rules shadow">
                <h5>{{$rules->name }}</h5>
                {!! $rules->information !!}
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
