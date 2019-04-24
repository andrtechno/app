
/**
 * Update selected comments status
 * @param status_id
 */

function setCommentsStatus(status_id, el)
{

    var dialogId = 'dialog' + Math.floor(Math.random());
    $("body").append($("<div/>", {
        "id": dialogId
    }));


    $('#' + dialogId).dialog({
        title: $(el).attr('data-question'),
        autoOpen: true,
        width: 300,
        modal: true,
        responsive: true,
        resizable: false,
        //  position: ['center','center'],
        close: function () {
            $(this).remove();

        },
        open: function () {
            $(this).html($(el).text());
        },
        buttons: [{
                text: common.message.cancel,
                'class': 'btn btn-default',
                click: function () {
                    $(this).dialog("close");

                }
            }, {
                text: "ОК",
                'class': 'btn btn-success',
                click: function () {
                    $.ajax('/admin/comments/default/updateStatus', {
                        type: "post",
                        data: {
                            token: common.token,
                            ids: $.fn.yiiGridView.getSelection('comments-grid'),
                            'switch': status_id
                        },
                        success: function (data) {
                            $.fn.yiiGridView.update('comments-grid');
                            $.jGrowl(data);
                            $('#' + dialogId).remove();
                        },
                        error: function (XHR, textStatus, errorThrown) {
                            var err = '';
                            switch (textStatus) {
                                case 'timeout':
                                    err = 'The request timed out!';
                                    break;
                                case 'parsererror':
                                    err = 'Parser error!';
                                    break;
                                case 'error':
                                    if (XHR.status && !/^\s*$/.test(XHR.status))
                                        err = 'Error ' + XHR.status;
                                    else
                                        err = 'Error';
                                    if (XHR.responseText && !/^\s*$/.test(XHR.responseText))
                                        err = err + ': ' + XHR.responseText;
                                    break;
                            }
                            alert(err);
                        }
                    });
                }
            }]
    })/*.dialog("widget").find(".ui-dialog-titlebar").hide()*/;


    return false;
}