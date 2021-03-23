$index = 0;
setAlbum($idAlbum);
showDisplay(0);

function plusDisplay(values) {
    $index += values;

    if ($index < 0) {
        $index = $('.display').length - 1;
    }
    if ($index >= $('.display').length) {
        $index = 0;
    }
    showDisplay($index);
};

$('.list').click(function() {
    $index = $('.list').index(this);
    showDisplay($('.list').index(this));
    $(window).scrollTop(0);
});

function setDisplay(target) {
    $index = $('.list').index(target);
    showDisplay($index);
    $(window).scrollTop(0);
}

function showDisplay($index) {
    $('.display').removeClass('active');
    $('.list').removeClass('active');
    $('.display').removeClass('box-transition');
    $('video').trigger('pause');
    $('.display').eq($index).addClass('box-transition');
    $('.display').eq($index).addClass('active');
    $('.list').eq($index).addClass('active');
}

function setAlbum(id) {
    $.ajax({
        type: "GET",
        url: '/galeri/take/' + id,
        data: '',
        cache: false,
        success: function(data) {
            $('#AlbumDisplay').html(data);
            $(window).scrollTop(0);
            $index = 0;
            showDisplay($index);
        }
    });
}
