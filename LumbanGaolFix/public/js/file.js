var jqueryProses = null;;
$('.folder').click(function() {
    $('.folder').removeClass('active');
    $(this).addClass('active');
    if ($(this).hasClass('foto')) {
        getFile('/Files/picture', 'tbody', '');
    } else if ($(this).hasClass('video')) {
        getFile('/Files/video', 'tbody', '');
    }
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#form-AddFoto').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    jqueryProses = $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.progress-bar').width(percentComplete + '%');
                    $('.progress-bar').html(percentComplete + '%');
                    if (percentComplete === 100) {
                        $('.progress-bar').addClass('bg-success');
                    }
                }
            }, false);

            return xhr;
        },
        type: 'POST',
        url: '/Files/picture/store',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('#batalkanUpload').removeClass('visibility');
            $('.progress-bar').removeClass('bg-success');
            $('.status').removeClass('visibility');
            $('.status').html('<div class="alert alert-info"><strong>Success!</strong> Upload Gambar.</div>');
            $('.progress').removeClass('visibility');
            var percentVal = '0%';
            $('.progress-bar').width(percentVal);
            $('.progress-bar').html(percentVal);
        },
        complete: function(xhr) {
            $('.status').html('<div class="alert alert-success"><strong>Success!</strong> Upload Gambar Berhasil.</div>');
        },
        success: function(data) {
            $('.folder.foto').trigger('click');
        }
    });
});

$('#form-AddVideo').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    jqueryProses = $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.progress-bar').width(percentComplete + '%');
                    $('.progress-bar').html(percentComplete + '%');
                    if (percentComplete === 100) {
                        $('.progress-bar').addClass('bg-success');
                    }
                }
            }, false);

            return xhr;
        },
        type: 'POST',
        url: '/Files/video/store',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $('#batalkanUpload').removeClass('visibility');
            $('.progress-bar').removeClass('bg-success');
            $('.status').removeClass('visibility');
            $('.status').html('<div class="alert alert-info"><strong>Tunggu!</strong> Sedang Upload Video.</div>');
            $('.progress').removeClass('visibility');
            var percentVal = '0%';
            $('.progress-bar').width(percentVal);
            $('.progress-bar').html(percentVal);
        },
        complete: function(xhr) {
            if (xhr.statusText == "OK") {
                $('.status').html('<div class="alert alert-success"><strong>Success !</strong> ' + xhr.statusText + '.</div>');
            } else {
                $('.status').html('<div class="alert alert-danger"><strong>Gagal !</strong> ' + xhr.statusText + '.</div>');
            }
        },
        success: function(data) {
            $('.folder.video').trigger('click');
        }
    });
});


function getFile($url, $target, $data, $type = 'GET') {
    jqueryProses = $.ajax({
        type: $type,
        url: $url,
        data: $data,
        cache: false,
        beforeSend: function() {
            $('.loading').addClass('active');
        },
        complete: function() {
            $('.loading').removeClass('active');
        },
        success: function(data) {
            $($target).html(data);
        }
    });
}

function check_uncheck_checkbox(isChecked, name) {
    if (isChecked) {
        $('input[name="' + name + '"]').each(function() {
            this.checked = true;
        });
    } else {
        $('input[name="' + name + '"]').each(function() {
            this.checked = false;
        });
    }
}

$('#deleteAll').click(function() {
    $table = "";
    if ($('.folder.active').hasClass('videos')) {
        $table = "videos";
    } else {
        $table = "pictures";
    }
    DeleteFile($('input[name="idFiles"]:checked'), $table);
});
$('#addAll').click(function() {
    SetData($('input[name="idFiles"]:checked'));
});

function DeleteFile($data, $table) {
    if (confirm("Apakah anda yakin ingin menghapus file ?")) {
        $len = $data.length;
        for (let index = 0; index < $data.length; index++) {
            var data = "idFiles=" + $data[index].value + "&table=" + $table;
            jqueryProses = $.ajax({
                type: 'post',
                url: '/Files/' + $table + '/delete',
                data: data,
                cache: false,
                beforeSend: function() {
                    $('#btn-' + $data[index].value + '>i').addClass('visibility');
                    $('#btn-' + $data[index].value + '>span').removeClass('visibility');
                },
                success: function(data) {}
            });
        }
        $('.folder.' + $table).trigger('click');
        console.log($table);
    }
    return false;
}

$('#batalkanUpload').on('click', function(e) {
    jqueryProses.abort();
    jqueryProses = null;
    var percentVal = '0%';
    $('.progress-bar').width(percentVal);
    $('.progress-bar').html(percentVal);
    $('#batalkanUpload').addClass('visibility');
});

function SetData($data) {
    $table = "";
    if ($('.folder.active').hasClass('videos')) {
        $table = "videos";
    } else {
        $table = "pictures";
    }
    var temp = new Array();
    for (let index = 0; index < $data.length; index++) {
        temp[index] = $data[index].value;
    }
    window.opener.TakeData(temp, $table);
    window.close();
    return false;
}
