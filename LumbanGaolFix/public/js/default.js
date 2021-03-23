$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function DeleteSpin(item) {
    $(item).children('i').removeClass('displayNone');
    $(item).children('span.text-btn').removeClass('displayNone');
    $(item).children('span.icon-loading').addClass('displayNone');
    $(item).children('span.text-loading').addClass('displayNone');
    $(item).removeClass('btn-info').addClass('btn-success');
}

function CreateSpin(item) {
    $(item).children('i').addClass('displayNone');
    $(item).children('span.text-btn').addClass('displayNone');
    $(item).children('span.icon-loading').removeClass('displayNone');
    $(item).children('span.text-loading').removeClass('displayNone');
    $(item).removeClass('btn-success').addClass('btn-info');
}

function liveSearch(url, page, target, key) {
    var fd = new FormData();
    fd.append('key', key);
    $.ajax({
        type: 'post',
        url: url + '?page=' + page,
        data: fd,
        enctype: "multipart/form-data",
        contentType: false,
        processData: false,
        success: function(data) {
            $(target).html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal mengambil data, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });

    return false;
}

function trigger(item, trigger) {
    $(item).trigger(trigger);
    return false;
}

function paginate(url, req = 'none', page, target) {
    type = req;
    $.ajax({
        type: 'GET',
        url: url + '?page=' + page,
        success: function(data) {
            $(target).html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal mengambil data, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });
}

function ajaxSend(url, method, data = null, funcSuc = null, funcCom = null, conf = null, alrt = null, funcBfr = null) {
    if (conf != null) {
        if (!confirm(conf)) {
            return false;
        }
    }
    var fd = null;
    if (data != null) {
        var fd = new FormData();
        var len = Object.keys(data).length;
        for (var x = 0; x < len; x++) {
            fd.append(Object.keys(data)[x], data[Object.keys(data)[x]]);
        }
    }
    $.ajax({
        type: method,
        url: url,
        data: fd,
        enctype: "multipart/form-data",
        contentType: false,
        processData: false,
        beforeSend: function() {
            if (funcBfr != null) {
                for (var i = 0; i < funcBfr.length; i++) {
                    if (funcBfr[i].length == 1) {
                        eval(funcBfr[i][0] + "()");
                    } else {
                        var param = "'" + funcBfr[i][1] + "'";
                        for (let index = 2; index < funcBfr[i].length; index++) {
                            param = param + "," + "'" + funcBfr[i][index] + "'";
                        }
                        eval(funcBfr[i][0] + "(" + param + ")");
                    }
                }
            }
        },
        complete: function(data) {
            if (funcCom != null) {
                for (var i = 0; i < funcCom.length; i++) {
                    if (funcCom[i].length == 1) {
                        eval(funcCom[i][0] + "()");
                    } else {
                        var param = "'" + funcCom[i][1] + "'";
                        for (let index = 2; index < funcCom[i].length; index++) {
                            param = param + "," + "'" + funcCom[i][index] + "'";
                        }
                        eval(funcCom[i][0] + "(" + param + ")");
                    }
                }
            }
        },
        success: function(data) {
            if (alrt != null) {
                alert(alrt);
            }
            if (funcSuc != null) {
                for (var i = 0; i < funcSuc.length; i++) {
                    if (funcSuc[i].length == 1) {
                        console.log(funcSuc[i].length);
                        eval(funcSuc[i][0] + "()");
                    } else {
                        var param = "'" + funcSuc[i][1] + "'";
                        for (let index = 2; index < funcSuc[i].length; index++) {
                            param = param + "," + "'" + funcSuc[i][index] + "'";
                            console.log(param);
                        }
                        eval(funcSuc[i][0] + "(" + param + ")");
                    }
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal meproses permintaan!, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });
    return false;
}

function readUrl(input, target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            target.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function submitForm(frm, ck = true) {
    if (ck) {
        for (var instanceName in CKEDITOR.instances)
            CKEDITOR.instances[instanceName].updateElement();
    }
    var data = new FormData(frm);
    $.ajax({
        type: $(frm).attr('method'),
        url: $(frm).attr('action'),
        data: data,
        enctype: "multipart/form-data",
        contentType: false,
        processData: false,
        beforeSend: function() {
            $(frm).children('button[type=submit]').children('i').addClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-btn').addClass('displayNone');
            $(frm).children('button[type=submit]').children('span.icon-loading').removeClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-loading').removeClass('displayNone');
            $(frm).children('button[type=submit]').removeClass('btn-success').addClass('btn-info');
        },
        complete: function() {
            $(frm).children('button[type=submit]').children('i').removeClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-btn').removeClass('displayNone');
            $(frm).children('button[type=submit]').children('span.icon-loading').addClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-loading').addClass('displayNone');
            $(frm).children('button[type=submit]').removeClass('btn-info').addClass('btn-success');

            $('input[type=file]').val('');
            $('custom-file-label').removeClass("selected").html('');
        },
        success: function(data) {
            alert("Berhasil menyimpan !");
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal meproses permintaan!, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });

    return false;
}

function submitFormRedirect(frm, Target, ck = true) {
    if (ck) {
        for (var instanceName in CKEDITOR.instances)
            CKEDITOR.instances[instanceName].updateElement();
    }
    var data = new FormData(frm);
    $.ajax({
        type: $(frm).attr('method'),
        url: $(frm).attr('action'),
        data: data,
        enctype: "multipart/form-data",
        contentType: false,
        processData: false,
        beforeSend: function() {
            $(frm).children('button[type=submit]').children('i').addClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-btn').addClass('displayNone');
            $(frm).children('button[type=submit]').children('span.icon-loading').removeClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-loading').removeClass('displayNone');
            $(frm).children('button[type=submit]').removeClass('btn-success').addClass('btn-info');
        },
        complete: function() {
            $(frm).children('button[type=submit]').children('i').removeClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-btn').removeClass('displayNone');
            $(frm).children('button[type=submit]').children('span.icon-loading').addClass('displayNone');
            $(frm).children('button[type=submit]').children('span.text-loading').addClass('displayNone');
            $(frm).children('button[type=submit]').removeClass('btn-info').addClass('btn-success');
        },
        success: function(data) {
            alert("Berhasil menyimpan !");
            window.location.href = Target;
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert('Gagal meproses permintaan!, pesan error : ' + xhr.status + ' (' + thrownError + ')');
        }
    });

    return false;
}

$('.custom-file>input[type=file]').change(function() {
    readUrl(this, $(this).parent().siblings('img'));
});

function refresh() {
    window.location.reload();
}


$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

});

$(window).resize(function() {
    if ($(window).width() < 1100) {
        $('#box').addClass('active');
        $('.dropDownItem').removeClass('active');
    } else {
        $('#box').removeClass('active');
        $('.dropDownItem').removeClass('active');
    }
});