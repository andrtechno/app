$(function () {
    var xhr;
    $(document).on('click', '.btn-wishlist:not(.added)', function (e) {
        var that = $(this);

        if (xhr && xhr.readyState !== 4) {
            xhr.onreadystatechange = null;
            xhr.abort();
        }

        xhr = $.ajax({
            url: that.attr('href'),
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#countWishlist').html(data.count);
                common.notify(data.message, 'success');
                that.addClass('added');
                //that.addClass('disabled');
                that.attr('title',data.title);
            }
        });

    });
    $(document).on('click', '.btn-wishlist', function (e) {
        e.preventDefault();
        return false;
    });
});