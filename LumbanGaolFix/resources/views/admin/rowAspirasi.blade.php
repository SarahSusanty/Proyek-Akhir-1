@foreach ($aspirations as $item)
<div class="listAspirasi shadow">
    <div class="userInfo">
        <img src="/uploads/img/UserProfile/{{ $item->profile }}" alt="">
        <h6>{{ $item->name }}</h6>
    </div>
    <div class="aspirasi">
        <h6>Topik: {{ $item->topic }}</h6>
        {!! $item->aspiration !!}
    </div>
    @if ($item->status == 'approved')
        <div class="approved">
            <i class="fas fa-check"></i>
            Diterima
        </div>
    @else
        @if ($item->status == 'waiting')
            <div class="waiting">
                <i class="fas fa-stopwatch"></i>
                Menunggu
            </div>
        @else
            @if ($item->status == 'rejected')
                <div class="rejected">
                    <i class="fas fa-times-circle"></i>
                    Ditolak
                </div>
            @else
                <div class="rejected">
                    <i class="fas fa-ban"></i>
                    Diblokir
                </div>
            @endif

        @endif
    @endif
    <strong>{{ $item->created_at }}</strong>
    <a href="#" class="btn btn-danger" onclick="return confirmAspirasi('batalkan',{{ $item->id }} ,'/admin/aspirasi/menunggu', this)">
        <i class="fas fa-ban"></i> <span class='text-btn'>Batalkan Konfirmasi</span>
        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
        <span class='text-loading displayNone'>Sedang Membatalkan Konfirmasi</span>
    </a>
    <div class="clear"></div>
</div>
@endforeach
{{ $aspirations->links() }}
