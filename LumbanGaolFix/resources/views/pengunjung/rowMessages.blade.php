<?php $before = 0;?>
@foreach ($messages as $item)
@if ($item->idUser == Auth::user()->id)
<div class="rightMessages">
    @if ($before !=  $item->idUser)
    <a href="" class="float-right hapusPesan" onclick="return deleteMessage(this)" data-id='{{ $item->id }}'><i class="fas fa-trash-alt"></i> <span>Hapus</span></a>
    <div class="profileMessage">
        <strong><b>{{ 'Anda' }}</b></strong>
    </div>
    @else
    <a href="" class="float-right hapusPesan" onclick="return deleteMessage(this)" data-id='{{ $item->id }}'><i class="fas fa-trash-alt"></i> <span>Hapus</span></a>
    <div class="clear"></div>
    @endif
    @if ($item->picture != NULL)
        <div class="imgTemp" style="width: 250px;">
            <img src="/uploads/message/img/{{ $item->picture }}" alt="" style="max-width: 100%;">
        </div>
    @endif
    @if ($item->document != NULL)
    <div class="itemFileM black shadow">
        <a target="_blank" href="/uploads/message/document/{{$item->document}}"><i class="fas fa-download"></i></a>
        <?php $temp = explode('.', $item->document);?>
        @if ($temp[1] == 'pdf')
        <i class="fas fa-file-pdf red"></i>
        @elseif($temp[1] == 'docx' || $temp[1] == 'docx')
        <i class="fas fa-file-word blue"></i>
        @elseif($temp[1] == 'xlsx' || $temp[1] == 'xls')
        <i class="fas fa-file-excel green"></i>
        @else
        <i class="fas fa-file-upload blueLight"></i>
        @endif
        <div class="spesifikasi">
            <small>{{ $item->document }}</small><br>
        </div>
    </div>
    @endif
    <pre>{{ $item->message }}</pre>
    <small>{{ $item->created_at }}</small>
</div>
<div class="clear"></div>
@else
<div class="leftMessages">
    @if ($before !=  $item->idUser)
    <div class="profileMessage">
        <strong><b>{{ $item->name }}</b></strong>
    </div>
    @endif
    @if ($item->picture != NULL)
        <div class="imgTemp" style="width: 250px;">
            <img src="/uploads/message/img/{{ $item->picture }}" alt="" style="max-width: 100%;">
        </div>
    @endif
    @if ($item->document != NULL)
    <div class="itemFileM black shadow">
        <a target="_blank" href="/uploads/message/document/{{$item->document}}"><i class="fas fa-download"></i></a>
        <?php $temp = explode('.', $item->document);?>
        @if ($temp[1] == 'pdf')
        <i class="fas fa-file-pdf red"></i>
        @elseif($temp[1] == 'docx' || $temp[1] == 'docx')
        <i class="fas fa-file-word blue"></i>
        @elseif($temp[1] == 'xlsx' || $temp[1] == 'xls')
        <i class="fas fa-file-excel green"></i>
        @else
        <i class="fas fa-file-upload blueLight"></i>
        @endif
        <div class="spesifikasi">
            <small>{{ $item->document }}</small><br>
        </div>
    </div>
    @endif
    <pre>{{ $item->message }}</pre>
    <small>{{ $item->created_at }}</small>
</div>
@endif
<?php $before =$item->idUser?>
@endforeach
