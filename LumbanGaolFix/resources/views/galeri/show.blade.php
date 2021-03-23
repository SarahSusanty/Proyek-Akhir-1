<div class="bigDisplay">
   @foreach ($picture as $item)
   <div class="display shadow">
    <img class="animasi-ketik" src="/uploads/img/Album/{{ $item->name }}" alt="">
    </div>
   @endforeach
   @foreach ($video as $item)
   <div class="display shadow">
        <video controls src="/uploads/video/Album/{{ $item->name }}"></video>
    </div>
   @endforeach
    <a href="#" id="prev" onclick="plusDisplay(-1)">&#10094;</a>
    <a href="#" id="next" onclick="plusDisplay(1)">&#10095;</a>
</div>
<div class="allInAlbum">
    <h6>Semua Gambar</h6>
    <div class="picture">
        @foreach ($picture as $item)
        <div class="list" onclick="setDisplay(this)">
            <img src="/uploads/img/Album/{{ $item->name }}" alt="" >
        </div>
        @endforeach
    </div>
    <h6>Semua Video</h6>
    <div class="video">
        @foreach ($video as $item)
        <div class="list" onclick="setDisplay(this)">
            <video src="/uploads/video/Album/{{ $item->name }}"></video>
        </div>
        @endforeach
    </div>
</div>
