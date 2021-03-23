@foreach ($aspirasi as $item)
    <div class="listAspirasi shadow clear">
        @if ($item->created_at >= $limitDate)
            <div class="new">
                <p>New</p>
            </div>
        @endif
        <h6>Topic : {{ $item->topic }} </h6>
        <div class="aspiration">
            {!! $item->aspiration !!}
        </div>
        @if ($item->status == 'approved' || $item->status == 'blocked')
        <a id="btnDelete{{ $item->id }}" class="btn btn-danger"  onclick="return ajaxSend('/pengunjung/aspirasi/delete','post',{'idAspirasi': {{ $item->id }}}, null,[['paginate','/pengunjung/paginate/all/aspirasi','all','1','.rowAspirasi']], 'Apakah anda ingin menghapus aspirasi ?', 'Berhasil menghapus aspirasi !', [['CreateSpin','#btnDelete{{ $item->id }}']])">
            <i class="fas fa-trash-alt"></i><span class='text-btn'> Hapus</span>
            <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
            <span class='text-loading displayNone'>Sedang Menghapus</span>
        </a>
        @else
        <a class="btn button-info" href="/pengunjung/aspirasi/edit/{{ base64_encode($item->id) }}" ><i class="fas fa-edit"></i> Edit</a>
        <a id="btnDelete{{ $item->id }}" class="btn btn-danger"  onclick="return ajaxSend('/pengunjung/aspirasi/delete','post',{'idAspirasi': {{ $item->id }}}, null,[['paginate','/pengunjung/paginate/all/aspirasi','all','1','.rowAspirasi']], 'Apakah anda ingin menghapus aspirasi ?', 'Berhasil menghapus aspirasi !', [['CreateSpin','#btnDelete{{ $item->id }}']])">
            <i class="fas fa-trash-alt"></i><span class='text-btn'> Hapus</span>
            <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
            <span class='text-loading displayNone'>Sedang Menghapus</span>
        </a>
        @endif
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

        <div class="clear"></div>
    </div>
@endforeach
{{ $aspirasi->links() }}
