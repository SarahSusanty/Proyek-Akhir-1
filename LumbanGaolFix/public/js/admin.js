$foot = $('.footer-right').offset();
$('#add').css({ 'top': ($foot.top - 69) + 'px' });
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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
$('#checkAll').click(function() {
    $(":checkbox").attr("checked", true);
    $('#uncheckAll').removeClass('displayNone');
    $('#checkAll').addClass('displayNone');
    return false;
});
// Uncheck All
$('#uncheckAll').click(function() {
    $(":checkbox").attr("checked", false);
    $('#uncheckAll').addClass('displayNone');
    $('#checkAll').removeClass('displayNone');
    return false;
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

function setFile($url, $target, $data, $type = 'GET') {
    jqueryProses = $.ajax({
        type: $type,
        url: $url,
        data: $data,
        cache: false,
        success: function(data) {
            // alert("Berhasil Menambahkan " + data.len + " " + data.table + " !");
            console.log(data);
        }
    });
}

function redirect(url, verify = true) {
    if (verify == false) {
        return window.location.href = url;
    }
    if (confirm("Apakah anda yakin ingin meninggalkan halaman ?") && verify == true) {
        return window.location.href = url;
    }
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

function DeleteTrigger(target, url, table) {
    var idFiles = $(target).attr('data-idFiles');
    var data = "idFiles=" + idFiles + "&idAlbum=" + $idAlbum;
    var index = $('.deletePicture').index(target);
    DeleteData(data, "deletePicture", url, index);
    setGaleri(table);
    return false;
}

function DeleteData(data, target, url, index, functionname = "") {
    if (confirm("Apakah anda akan menghapus data ini ?")) {
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            cache: false,
            beforeSend: function() {
                $('.' + target + '>i').eq(index).addClass('displayNone');
                $('.' + target + '>span').eq(index).removeClass('displayNone');
            },
            success: function(data) {
                window[functionname]();
            }
        });
    }
}

$('.editAlbum').click(function() {
    var tempt = "idFiles=" + $(this).attr('data-idAlbum') + "&table=albums";
    $.ajax({
        type: "POST",
        url: "/admin/takeByID",
        data: tempt,
        cache: false,
        success: function(d) {
            $('#fileName').val(d.name);
            $('#Desc').val(d.description);
            $('#idDisplay').val(d.idDisplay);
            tempt = "idFiles=" + d.idDisplay + "&table=pictures";
            $('#form-Album').attr("action", "/admin/galeri/editAlbum");
            $('#idAlbum').val(d.id);
            $('#idAlbum').html("Simpan Perubahan");
            $.ajax({
                type: "POST",
                url: "/admin/takeByID",
                data: tempt,
                cache: false,
                success: function(d) {
                    $('.preview>img').attr('src', d.location + d.name);
                    $('#idDisplay').val(d.id);
                }
            })
        }
    })
});

$('.delete-Album').click(function() {
    $data = $('input[name="idAlbums"]:checked');
    var tempt = new Array();
    for (let index = 0; index < $data.length; index++) {
        tempt[index] = $('input[name="idAlbums"]:checked')[index].value;
    }
    var temp = "idAlbum=" + tempt;
    DeleteData(temp, "delete-Album", "/admin/galeri/deleteAlbum", 0, "refresh");
});

function LinksItem() {
    $len = $('.bigContent>a').length;
    for (let index = 0; index < $len - 1; index++) {
        $('.tempt').append("<div class='form-row mt-3' id='" + index + "'>" +
            "<div class='col'><label>Nama Link</label><input class='form-control text' value='" + $('.bigContent>a').eq(index).text() + "'></div>" +
            "<div class='col'><label>Target Link</label><input class='form-control target' value='" + $('.bigContent>a').eq(index).attr('href') + "'></div>" +
            "<a href='#' class='a-danger mt-5' onclick='return removeLinksItem(" + index + ")'> <i class='fas fa-minus-circle' ></i> Drop</a>" +
            "</div>");
    }
}

function addLinksItem() {
    $len = $('.form-row').length - 1;
    var index = $len + 1;
    $('.tempt').append("<div class='form-row mt-3' id='" + index + "'>" +
        "<div class='col'><label>Nama Link</label><input class='form-control text' value=''></div>" +
        "<div class='col'><label>Target Link</label><input class='form-control target' value='' required></div>" +
        "<a href='#' class='a-danger mt-5' onclick='return removeLinksItem(" + index + ")'> <i class='fas fa-minus-circle' ></i> Drop</a>" +
        "</div>");
    return false;
}

function removeLinksItem(index) {
    $('#' + index).remove();
    return false;
}

function createLinkText($type, $id) {
    $text = $('.form-row').eq(0).children('.col').eq(0).children('.text').val();
    $target = $('.form-row').eq(0).children('.col').eq(1).children('.target').val();
    $result = "<a href='" + $target + "'>" + $text + "</a>";
    $con = true;
    for (let index = 1; index < $('.form-row').length; index++) {
        $text = $('.form-row').eq(index).children('.col').eq(0).children('.text').val();
        $target = $('.form-row').eq(index).children('.col').eq(1).children('.target').val();
        $result = $result + "|" + "<a href='" + $target + "'>" + $text + "</a>";
        if ($text == '' || $text == 'undefined') {
            $('.form-row').eq(index).children('.col').eq(0).children('.text').css({ border: '2px solid red' });
            $con = false;
        } else {
            $('.form-row').eq(index).children('.col').eq(0).children('.text').css({ border: '2px solid green' });
        }
        if ($target == 'undefined' || $target == '') {
            $('.form-row').eq(index).children('.col').eq(1).children('.target').css({ border: '2px solid red' });
            $con = false;
        } else {
            $('.form-row').eq(index).children('.col').eq(1).children('.target').css({ border: '2px solid green' });
        }
    }
    if ($con) {
        $data = "information=" + $result;
        $.ajax({
            type: 'POST',
            url: '/admin/Data/' + $type + '/edit/' + $id + '/save',
            data: $data,
            cache: false,
            beforeSend: function() {
                $('#button-send>i').addClass('displayNone');
                $('#button-send>span.text-btn').addClass('displayNone');
                $('#button-send>span.icon-loading').removeClass('displayNone');
                $('#button-send>span.text-loading').removeClass('displayNone');
            },
            success: function(data) {
                alert("Berhasil melakukan perubahan");
                window['refresh']();
            }
        });
    }
    return false;
}

function addNewSlider() {
    ArrayResult.push({ judul: 'None', description: 'None', image: 'None' });
    var last = $('.slider-item').length;
    console.log(last);
    $('.tempt').append("<div class='slider-item mb-5 shadow p-3'>" +
        "<a href='#' onclick='return dropSlider($(this).parent().index())' class='a-danger float-right'><i class='fas fa-trash-alt'></i>  Buang Item</a>" +
        "<div class='form-group'>" +
        "<label for=''>Judul Slider</label>" +
        "<input type='text' name=''  class='form-control' value=''>" +
        "<label for=''>Deskripsi/tag</label>" +
        "<textarea name='editor" + last + "'rows='5' class='form-control editor'></textarea>" +
        "</div>" +
        '<div class="slider-Img" style="width: 80%;">' +
        '<img src="" alt="Preview" width="100%">' +
        '<input type="hidden" name="oldName' + last + '" value="">' +
        ' <div class="custom-file">' +
        ' <input type="file" class="custom-file-input" id="customFile' + last + '" oninput="readUrl(this,' + "$('#customFile" + last + "').parent().siblings('img')" + ')">' +
        '<label class="custom-file-label" for="customFile' + last + '">Choose file</label>' +
        "</div>" +
        "</div>" +
        '<button class="btn btn-success mt-2" onclick="return slider(this)">' +
        '<i class="fas fa-check"></i> ' +
        "<span class='text-btn'>Simpan</span>" +
        '<span class="spinner-border spinner-border-sm displayNone icon-loading"></span>' +
        "<span class='text-loading displayNone'>Sedang Menyimpan Perubahan</span>" +
        '</button>' +
        '<p class="float-right displayNone" >Tersimpan</p>' +
        "</div>");
    $('editor').eq(last).attr("id", "editor" + last);
    CKEDITOR.replace('editor' + last);
    return false;
}

function slider(item) {
    for (var instanceName in CKEDITOR.instances)
        CKEDITOR.instances[instanceName].updateElement();

    ArrayResult[$(item).parent().index()]['judul'] = $(item).siblings('.form-group').children('input').val();
    ArrayResult[$(item).parent().index()]['description'] = $(item).siblings('.form-group').children('textarea').val();
    if ($(item).siblings('.slider-Img').children('.custom-file').children('input')[0].files[0]) {
        let fd = new FormData();
        var files = $(item).siblings('.slider-Img').children('.custom-file').children('input')[0].files[0];
        fd.append('file', files);
        fd.append('location', 'uploads/img/AsetWeb/Carousel');
        fd.append('name', 'random');
        $.ajax({
            url: '/uploadFile',
            type: 'post',
            data: fd,
            enctype: "multipart/form-data",
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(item).children('i').addClass('displayNone');
                $(item).children('span.text-btn').addClass('displayNone');
                $(item).children('span.icon-loading').removeClass('displayNone');
                $(item).children('span.text-loading').removeClass('displayNone');
                $(item).removeClass('btn-success').addClass('btn-info');
            },
            complete: function() {
                $(item).children('i').removeClass('displayNone');
                $(item).children('span.text-btn').removeClass('displayNone');
                $(item).children('span.icon-loading').addClass('displayNone');
                $(item).children('span.text-loading').addClass('displayNone');
                $(item).removeClass('btn-info').addClass('btn-success');
                $(item).siblings('.slider-Img').children('.custom-file').children('input').val("");
                $(item).siblings('.slider-Img').children('.custom-file').children('.custom-file-label').removeClass("selected").html('');
            },
            success: function(response) {
                if ($(item).siblings('.slider-Img').children('input').val() != '') {
                    var temptFile = new FormData();
                    var b = $(item).siblings('.slider-Img').children('input').val();
                    console.log(b);
                    temptFile.append('name', b);
                    temptFile.append('location', 'uploads/img/AsetWeb/Carousel');
                    $.ajax({
                        url: '/deleteFile',
                        type: 'post',
                        data: temptFile,
                        contentType: false,
                        processData: false,
                        success: function() {}
                    });
                }
                ArrayResult[$(item).parent().index()]['image'] = response.name_file;
                $(item).siblings('.slider-Img').children('input').val(response.name_file);
            },
        });
    } else {
        ArrayResult[$(item).parent().index()]['image'] = $(item).siblings('.slider-Img').children('input').val();
    }
    $(item).parent().children('p').removeClass('displayNone').addClass('approved mt-2');
    return false;
};

function dropSlider(index) {
    console.log(index);
    if ($('.slider-item').eq(index).children('button').siblings('.slider-Img').children('input').val() != '') {
        var temptFile = new FormData();
        var b = $('.slider-item').eq(index).children('button').siblings('.slider-Img').children('input').val();
        temptFile.append('name', b);
        temptFile.append('location', 'uploads/img/AsetWeb/Carousel');
        $.ajax({
            url: '/deleteFile',
            type: 'post',
            data: temptFile,
            contentType: false,
            processData: false,
            success: function() {}
        });
    }
    $('.slider-item').eq(index).remove();
    ArrayResult.splice(index, 1);
    return false;
}
$(document).ready(function() {
    $len = $('.slider-item').length;
    for (let index = 0; index < $len; index++) {
        ArrayResult.push({ judul: 'None', description: 'None', image: 'None' });
        $('.slider-item').eq(index).children('button').trigger('click');
    }
});

function TerapkanSlider(id, item) {
    $len = $('.slider-item').length;
    var temp = new Array();
    var tempImg = new Array();
    for (let index = 0; index < $len; index++) {
        var tempt = ArrayResult[index]['judul'] + '|' + ArrayResult[index]['description'];
        temp.push(tempt);
        tempImg.push(ArrayResult[index]['image']);
    }
    var tempResult = temp.join('#');
    var tempImageResult = tempImg.join('#');
    var data = new FormData;
    data.append('information', tempResult);
    data.append('picture', tempImageResult);
    $.ajax({
        type: 'POST',
        url: '/admin/Data/slider/edit/' + id + '/save',
        data: data,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $(item).children('i').addClass('displayNone');
            $(item).children('span.text-btn').addClass('displayNone');
            $(item).children('span.icon-loading').removeClass('displayNone');
            $(item).children('span.text-loading').removeClass('displayNone');
            $(item).removeClass('btn-success').addClass('btn-info');
        },
        complete: function() {
            $(item).children('i').removeClass('displayNone');
            $(item).children('span.text-btn').removeClass('displayNone');
            $(item).children('span.icon-loading').addClass('displayNone');
            $(item).children('span.text-loading').addClass('displayNone');
            $(item).removeClass('btn-info').addClass('btn-success');
        },
        success: function(data) {
            alert("Berhasil Menerapkan");
            window['refresh']();
        }
    });

    return false;
}

function deleteInformation(item) {
    var tempt = new Array();

    $('input[name=mark]:checked').each(function() {
        tempt.push($(this).val());
    });
    var data = "id=" + tempt;
    $.ajax({
        type: 'POST',
        url: '/admin/informasi/hapus',
        data: data,
        cache: false,
        beforeSend: function() {
            $(item).children('i').addClass('displayNone');
            $(item).children('span.text-btn').addClass('displayNone');
            $(item).children('span.icon-loading').removeClass('displayNone');
            $(item).children('span.text-loading').removeClass('displayNone');
        },
        success: function(data) {
            alert("Berhasil Menghapus");
            window['refresh']();
        }
    });
    return false;
}


function confirmAspirasi(confirm, id, target, item) {
    console.log('masuk');
    $.ajax({
        type: 'get',
        url: '/admin/aspirasi/' + id + '/konfirmasi/' + confirm,
        beforeSend: function(data) {
            $(item).children('i').addClass('displayNone');
            $(item).children('span.text-btn').addClass('displayNone');
            $(item).children('span.icon-loading').removeClass('displayNone');
            $(item).children('span.text-loading').removeClass('displayNone');
        },
        success: function(data) {
            alert('Berhasil !');
            window.location.href = target;
        }
    });
}

function getMessages(idForum, target, read = 'yes', scroll = 'yes') {
    $.ajax({
        type: 'get',
        url: '/admin/forum/messages/' + idForum + '/' + read,
        complete: function() {
            if (scroll == 'yes') {
                $(target).animate({
                    scrollTop: ($(target).get(0).scrollHeight)
                }, 50);
            }
        },
        success: function(data) {
            $(target).html(data);
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
            url: '/admin/forum/messages/send',
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