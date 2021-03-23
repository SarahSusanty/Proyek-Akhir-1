$('#navbarToggle').click(function() {
    $('#box').toggleClass('active');
    $('.dropDownItem').removeClass('active');
});
$('.dropDown').click(function() {
    $tempt = $(this).attr('data-target');
    $($tempt).toggleClass('active');
    $('#box').removeClass('active');
});
if ($(window).width() < 1100) {
    $('#box').addClass('active');
    $('.dropDownItem').removeClass('active');
} else {
    $('#box').removeClass('active');
    $('.dropDownItem').removeClass('active');
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function checkDelete() {
    if (confirm("Apakah anda yakin ingin menghapus file?")) {
        return true;
    } else {
        return false;
    }
}

function checkKeluar() {
    if (confirm("Apakah anda yakin ingin Keluar Dari Forum ")) {
        return true;
    } else {
        return false;
    }
}

function getMessages(idForum, target, read = 'yes', scroll = 'yes') {
    $.ajax({
        type: 'get',
        url: '/forum/messages/' + idForum + '/' + read,
        complete: function() {
            if (scroll == 'yes') {
                $(target).animate({
                    scrollTop: ($(target).get(0).scrollHeight)
                }, 50);
            }
        },
        success: function(data) {
            $(target).html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal mengambil data, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });
}

function sendMessage(idForum, item) {
    if ($('#msg').val() == '' && $('input[name=picture]').val() == '' && $('input[name=document]').val() == '') {
        alert('Pesan tidak boleh kosong');
    } else {
        var fd = new FormData();
        var picture = $('input[name=picture]')[0].files[0];
        var document = $('input[name=document]')[0].files[0];
        $('.close').trigger('click');
        fd.append('msg', $('#msg').val());
        fd.append('picture', picture);
        fd.append('document', document);
        fd.append('idForum', idForum);
        $.ajax({
            url: '/forum/messages/send',
            type: 'post',
            data: fd,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(item).children('i').addClass('displayNone');
                $(item).children('span').removeClass('displayNone');
            },
            complete: function() {
                $(item).children('i').removeClass('displayNone');
                $(item).children('span').addClass('displayNone');
            },
            success: function() {
                $('input[name=picture]').val('');
                $('input[name=document]').val('');
                $('textarea').val('');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('Gagal mengirim pesan, pesan error : ' + xhr.status + ' (' + thrownError + ')');
            }
        });
    }
    return false;
}

function requestJoin(id) {
    $.ajax({
        type: 'GET',
        url: '/pengunjung/' + id + '/join/request',
        success: function(data) {
            alert('Berhasil meminta bergabung');
            window.location.href = '/pengunjung/forum/menunggu';
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal Join, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });

    return false;
}