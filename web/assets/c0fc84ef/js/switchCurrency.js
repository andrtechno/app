function switchCurrency(currency_id) {
    var url = $('#sw' + currency_id).attr('href');
    $.ajax({
        url: url,
        type: 'POST',
        success: function () {
            window.location.reload(true);
        }
    });
    return false;
}

