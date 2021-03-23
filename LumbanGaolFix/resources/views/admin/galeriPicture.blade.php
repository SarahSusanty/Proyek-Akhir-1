<h6> <i class="fas fa-image"></i> Gambar</h6>
<div class="rowFiles">
@if ($pictures->isEmpty())
    <h3>Belum ada Gambar</h3>
@else
@foreach ($pictures as $item)
<div class="file shadow hover">
    <div class="fileSetting">
        <a  class="btn btn-danger deletePicture" onclick="return DeleteTrigger(this, '/admin/galeri/delete/pictures', 'pictures')" data-idFiles = "{{ $item->id }}">
            <i class="fas fa-trash-alt"></i>
            <span class="spinner-border spinner-border-sm displayNone"></span>
        </a>
    </div>
    <img class="mt-2" src="{{ $item->location . $item->name }}" alt="Foto">
    <p>{{ $item->name }}</p>
    <small>{{ $item->created_at }}</small>
</div>
@endforeach
@endif
</div>

