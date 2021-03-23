@foreach ($forums as $item)
<div class="listForum shadow">
    <div class="flex-baru-row">
        <div class="logoForum">
            <img src="/uploads/img/Forums/Logo/{{ $item->logo }}" alt="">
        </div>
        <div class="descForum ml-2">
            <h5>{{ $item->name }}</h5>
            {!! $item->description !!}
        </div>
    </div>
    <a onclick='return requestJoin("{{ base64_encode($item->id) }}")' href="#" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Request Join Forum</a>
    <div class="clear"></div>
</div>

@endforeach
{{ $forums->links() }}
