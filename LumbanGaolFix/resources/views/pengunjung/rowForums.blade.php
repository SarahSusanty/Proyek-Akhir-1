@foreach ($forums as $item)
    <div class="listForum shadow">
        @if ($item->counts != 0)
            <div class="pesanbaru">{{ $item->counts }}</div>
        @endif
        <div class="flex-baru-row"
            onclick="window.location.href='/pengunjung/{{ base64_encode($item->id) }}/messages'">
            <div class="logoForum">
                <img src="/uploads/img/Forums/Logo/{{ $item->logo }}" alt="">
            </div>
            <div class="descForum">
                <h5>{{ $item->name }}</h5>
                {!! $item->description !!}
            </div>
        </div>
        <a onclick="return ajaxSend('/pengunjung/forum/keluar','post',{'idForum': {{ $item->id }}}, null,[['liveSearch','/pengunjung/liveSearchForum','1', '.rowForums', key]], 'Apakah anda ingin keluar dari forum ?', 'berhasil') " href="#" class="btn btn-danger"><i
                class="fas fa-sign-out-alt"></i> Keluar Dari Forum</a>
        <div class="clear"></div>
    </div>
@endforeach
{{ $forums->links() }}
