<h5>Video</h5>
<table class="table ">
    <thead>
        <tr>
            <th style="text-align: center">Video</th>
            <th style="text-align: center">Nama Video</th>
            <th style="text-align: center">Tanggal Dibuat</th>
            <th style="text-align: center">Edit</th>
        </tr>
    </thead>
    <tbody>
        @if ($video->isEmpty())
            <tr>
                <td colspan='4'>
                    <p>Tidak Ada Video</p>
                </td>
            </tr>
        @else
            @foreach ($video as $item)
                <tr>
                    <td style="font-size: 40px;text-align: center;"><a target="_blank"
                            href="{{ $item->location . $item->name }}" data-placement="bottom"
                            title="Tekan untuk melihat video"><i class="fas fa-file-video"></i></a></td>
                    <td style="text-align: center">{{ $item->name }}</td>
                    <td style="text-align: center">{{ $item->created_at }}</td>
                    <td style="text-align: center">  <a  class="btn btn-danger deletePicture" onclick="return DeleteTrigger(this, '/admin/galeri/delete/video', 'videos')" data-idFiles = "{{ $item->id }}">
                        <i class="fas fa-trash-alt"></i>
                        <span class="spinner-border spinner-border-sm displayNone"></span>
                    </a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

