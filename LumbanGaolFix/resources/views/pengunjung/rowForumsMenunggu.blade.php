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
        <div class="waiting">
            <i class="fas fa-watch"></i> Menunggu
        </div>
    </div>
@endforeach
{{ $forums->links() }}
