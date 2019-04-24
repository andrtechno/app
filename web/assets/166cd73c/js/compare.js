$(function () {
    var xhr;
    $(document).on('click', '.btn-compare:not(.added)', function (e) {
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
                $('#countCompare').html(data.count);
                common.notify(data.message, 'success');
                that.addClass('added');
                that.attr('title',data.title);
                //that.addClass('disabled');
            }
        });
    });


    $(document).on('click', '.btn-compare', function (e) {
        e.preventDefault();
        return false;
    });
});