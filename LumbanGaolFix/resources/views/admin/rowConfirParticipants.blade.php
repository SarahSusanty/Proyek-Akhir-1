    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th width="40%">Nama</th>
                <th>Alamat</th>
                <th>Umur</th>
                <th>Forum Name</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $item)
                <tr>
                    <td><a target="_blank" href="/informasi/baca/{{ $item->id }}" data-toggle="tooltip"
                            title="Klik untuk melihat informasi">{{ $item->name}}</a></td>
                    <td style="text-align: center;">{{ $item->alamat }}</td>
                    <td></td>
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
                        <a href="" id="btn0{{ $item->id }}" class="btn btn-success" onclick="return ajaxSend('/admin/forum/participants/confirm/proses','post',{'idForum': {{ $item->idForum }},'idUser':{{ $item->id }}, 'status':'approved'}, null,[['liveSearch','/admin/forum/participants/Confirm/row','1', '.table-responsive', key]], 'Apakah anda yakin ingin menerima permintaan ?', 'Berhasil Mengkonfirmasi anggota!', [['CreateSpin','#btn0{{ $item->id }}']]) ">
                            <i class="fas fa-check-circle"></i> <span class='text-btn'>Terima</span>
                            <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                            <span class='text-loading displayNone'>Mengkonfirmasi</span>
                        </a>
                        <a href="" id="btn1{{ $item->id }}" class="btn btn-danger" onclick="return ajaxSend('/admin/forum/participants/confirm/proses','post',{'idForum': {{ $item->idForum }},'idUser':{{ $item->id }},'status':'rejected'}, null,[['liveSearch','/admin/forum/participants/Confirm/row','1', '.table-responsive', key]], 'Apakah anda yakin ingin menolak permintaan dari pengunjung?', 'Berhasil Mengkonfirmasi anggota!', [['CreateSpin','#btn1{{ $item->id }}']]) ">
                            <i class="fas fa-times"></i> <span class='text-btn'>Tolak</span>
                            <span class="spinner-border spinner-border-sm displayNone icon-loading"></span>
                            <span class='text-loading displayNone'>Mengkonfirmasi</span>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $participants->links() }}
