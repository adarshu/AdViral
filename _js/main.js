$(document).ready(function () {

    $('.buy-btn').on("click", function () {
        var p = $(this).attr('price');
        var t = $(this).attr('title');
        var guid = $(this).attr('guid');
        var url = $(this).attr('url');
        $('.buy-title').text(t);
        $('.bought-title').text(t);
        $('.buy-price').text(p);
        $('.buy-guid').text(guid);

        if (p === "0") {
            $('.freepanel').show();
            $('.freelink').attr('href', url);
            $('.paidpanel').hide();
        }
        else {
            $('.freepanel').hide();
            $('.paidpanel').show();
        }
    })

    $('.buy-confirm').on("click", function () {
        var guid = $('.buy-guid').text();

        $.get("api.php?a=buynote&id=" + guid, function (data) {
            $('#buyModal').modal('hide');
            $('#boughtModal').modal('show');
        });
    })

    $('.add-confirm').on("click", function () {
        $.get('http://adviral.com/api.php?a=added&b='+encodeURIComponent('Ying Yang Restaurant')+'&t=' + encodeURIComponent('Best Chinese Restaurant'), function (data) {
//            alert('Email sent!');
        });
        $('.item3').fadeIn(2000).removeClass('hide');
        $('#addModal').modal('hide');
    })

});
