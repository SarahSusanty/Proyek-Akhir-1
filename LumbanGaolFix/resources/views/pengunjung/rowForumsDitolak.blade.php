@foreach ($forums as $item)
    <div class="listForum shadow">
        @if ($item->counts != 0)
            <div class="pesanbaru">{{ $item->counts }}</div>
        @endif
        <div class="flex-baru-row">
            <div class="logoForum">
                <img src="/uploads/img/Forums/Logo/{{ $item->logo }}" alt="">
            </div>
            <div class="descForum">
                <h5>{{ $item->name }}</h5>
                {!! $item->description !!}
            </div>
        </div>
        <a onclick="return ajaxSend('/pengunjung/forum/coba','post',{'idForum': {{ $item->id }}}, null,[['liveSearch','/pengunjung/forum/ditolak/row','1', '.rowForums', key]], 'Apakah anda ingin mencoba bergabung kembali ?', 'Berhasil mengirim permintaan!') " href="/aspirasi" class="btn btn-warning"><i
                class="fas fa-sign-in-alt"></i>Coba untuk bergabung lagi </a>
        <div class="clear"></div>
    </div>
@endforeach
{{ $forums->links() }}
