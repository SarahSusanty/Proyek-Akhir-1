@foreach ($files as $item)
<tr>
    <td style="width: 40px;text-align:center;"><input type="checkbox" name="idFiles" id="{{ $item->id }}" value="{{ $item->id }}"></td>
    <td style="width: 50%;">
        <div class="fileIcon">
            <img src="{{ $item->location.$item->name }}" alt="" width="40px">
        </div>
        <div class="fileName">
            <a target="_blank" href="{{ $item->location.$item->name }}">{{ $item->name }}</a>
        </div>
    </td>
    <td style="width: 170px;text-align:center;">{{ $item->created_at }}</td>
    <td style="width: calc(50%-190px);text-align:center;">
        <a href="" class="btn btn-info mr-2" id="btnAdd-{{ $item->id }}" onclick="return SetData($('#{{ $item->id }}'))">
            <i class="fas fa-plus"></i>
        </a>
        <a href="#" onclick="return DeleteFile( $('#{{ $item->id }}'), 'pictures')" class="btn btn-danger" id="btn-{{ $item->id }}">
            <i class="fas fa-trash-alt"></i>
            <span class="spinner-border spinner-border-sm visibility"></span>
        </a>
    </td>
</tr>

@endforeach
