<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th width="40px"> <input type="checkbox" id="" class="form-control"
                    onclick="check_uncheck_checkbox(this.checked, 'mark')"></th>
            <th width="40%">Judul</th>
            <th>Tanggal Buat</th>
            <th>Display</th>
            <th width="60px">Total Dibaca</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($informations as $item)
            <tr>
                <td>
                    <div class="form-group">
                        <input type="checkbox" name="mark" value="{{ $item->id }}" id="" class="form-control">
                    </div>
                </td>
                <td><a target="_blank" href="/informasi/baca/{{ base64_encode($item->id) }}" data-toggle="tooltip"
                        title="Klik untuk melihat informasi">{{ $item->title }}</a></td>
                <td style="text-align: center;">{{ $item->created_at }}</td>
                <td style="text-align: center;"><img src="/uploads/img/Album/{{ $item->name }}" alt="Display"
                        width="40px"></td>
                <td style="text-align: center;">{{ $item->view }}</td>
                <td style="text-align: center;"><a href="/admin/informasi/edit/{{ $item->id }}"><i
                            class="fas fa-edit"></i> Edit</a></td>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $informations->links() }}

<script>
    $(document).ready(function() {
    $('td img').on('mouseenter', function() {
        $('.showImg').removeClass('visibility');
        $x = $(this).offset();
        $m = $('.showImg>img').height();
        $('.showImg>img').attr('src', $(this).attr('src'));
        $('.showImg').css({ 'left': ($x.left - 300) + 'px', top: ($x.top - $m - 20) + 'px' });
    });
    $('td img').on('mouseleave', function() {
        $('.showImg').addClass('visibility');
    });
    $('td img.pop-right').on('mouseenter', function() {
        $('.showImg').removeClass('visibility');
        $x = $(this).offset();
        $m = $('.showImg>img').height();
        $('.showImg>img').attr('src', $(this).attr('src'));
        $('.showImg').css({ 'left': ($x.left + $(this).width()) + 'px', top: ($x.top - $m + 20) + 'px' });
    });
    $('td img.pop-right').on('mouseleave', function() {
        $('.showImg').addClass('visibility');
    });
});

</script>
