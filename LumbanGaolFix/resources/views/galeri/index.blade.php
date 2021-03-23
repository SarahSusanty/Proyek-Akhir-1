@extends('layouts.defaultone')
@section('title', 'Galeri')
@section('edit-css')
    <link rel="stylesheet" href="/css/galeri.css">
@endsection
@section('content')
<div class="padding-default">
    <div id="AlbumDisplay" class="shadow">

    </div>
    <div class="Album mt60">
        @foreach ($albums as $item)
        <div class="listAlbum shadow">
            <div class="displayAlbum">
                <img src="{{ $item->location.$item->picture }}" alt="">
            </div>
            <div class="listDesc">
                <h6>{{ $item->name }}</h6>
                <p>{{ $item->description }}</p>
                <button class="btn button-info" onclick="setAlbum({{ $item->id }})">Lihat Album</button>
            </div>
        </div>
        @endforeach
        {{ $albums->links() }}
    </div>
</div>
<div class="footer">
    <p>{{ $crfoot->information }}</p>
</div>
@endsection
@section('edit-js')
    @if (Session::has('idAlbum'))
    <script>
        $idAlbum = {{ Session::get('idAlbum') }};
    </script>
    @else
    <script>
        $idAlbum = {{ $albums[0]->id }};
    </script>
    @endif
    <script src="{{ asset('js/galeri.js') }}"></script>
@endsection
