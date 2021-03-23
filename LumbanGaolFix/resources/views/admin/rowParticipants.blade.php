<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th width="40%">Nama</th>
            <th>Alamat</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($participants as $item)
            <tr>
                <td><a target="_blank" href="/informasi/baca/{{ $item->id }}" data-toggle="tooltip"
                        title="Klik untuk melihat informasi">{{ $item->name}}</a></td>
                <td style="text-align: center;">{{ $item->alamat }}</td>
                <td style="text-align: center;">
                    @if ($item->umur != Null)
                        <?php
                            $now = Carbon\Carbon::now();
                            $b_day = Carbon\Carbon::parse($item->umur);
                            $age = $b_day->diffInYears($now);
                            echo $age;
                        ?>
                    @endif
                </td>
                <td style="text-align: center;">
                    <a href="" id="btnOut{{ $item->id }}" class="btn btn-danger" onclick="return ajaxSend('/admin/forum/participants/out','post',{'idForum': {{ $item->idForum }},'idUser':{{ $item->id }}}, null,[['liveSearch','/admin/forum/participants/row/{{ $item->idForum }}','1', '.table-responsive', key]], 'Apakah anda yakin ingin mengeluarkan anggota forum ?', 'Berhasil mengeluarkan anggota!', [['CreateSpin','#btnOut{{ $item->id }}']]) ">
                        <i class="fas fa-sign-out-alt"></i> <span class='text-btn'>Keluarkan</span>
                        <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                        <span class='text-loading displayNone'>Sedang Membatalkan</span>
                    </a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $participants->links() }}
