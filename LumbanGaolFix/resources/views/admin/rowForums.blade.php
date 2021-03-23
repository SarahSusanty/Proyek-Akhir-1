@foreach ($forums as $item)
<div class="listForum shadow" >
    <div class="float-right">
        <a href="/admin/forum/edit/{{ base64_encode($item->id) }}"><i class="fas fa-edit"></i></a>
    </div>
    @if ($item->counts != 0)
    <div class="pesanbaru">{{ $item->counts }}</div>
    @endif
    <div class="flex-baru-row" onclick="window.location.href='/admin/forum/{{ base64_encode($item->id) }}/messages'">
        <div class="logoForum">
            <img src="/uploads/img/Forums/Logo/{{ $item->logo }}" alt="">
        </div>
        <div class="descForum ml-2">
            <h6>{{ $item->name }}</h6>
            {!! $item->description !!}
        </div>
    </div>
    <div class="float-right">
        <a href="/admin/forum/participants/{{ base64_encode($item->id) }}" class="btn btn-info"><i class="fas fa-user-friends"></i></a>
        <a href="" class="btn btn-danger" onclick="return deleteForum(this)" data-id='{{ $item->id }}'><i class="fas fa-trash-alt"></i></a>
    </div>
    <div class="clear"></div>
</div>
@endforeach
{{ $forums->links() }}
