$(function () {
    $('.quote').on('click', function () {
        $.ajax({
            url: $(this).attr('href'),
            dataType: 'json',
            success: function (data) {
                tinyMCE.activeEditor.execCommand('mceInsertContent', false, data.quote_html);
            }
        });
        return false;
    });




    $(".remove-editor").on("click", function () {
        console.log('ss');
    });
});

