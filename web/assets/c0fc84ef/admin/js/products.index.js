

// Init tree
/*
 $('#CategoryTreeFilter').bind('loaded.jstree', function (event, data) {
 //data.inst.open_all(0);
 }).delegate("a", "click", function (event) {
 try {
 var id = $(this).parent("li").attr('id').replace('CategoryTreeFilterNode_', '');
 } catch (err) {
 // 'All Categories' clicked
 var id = 0;
 }
 var obj = $('#product-grid .filters td')[0];
 $(obj).append('<input name="category" type="hidden" value="' + id + '">');
 $('#productsListGrid .filters :input').first().trigger('change');
 });
 */


/**
 * Update selected comments status
 * @param status_id
 */
function setProductsStatus(status_id, el)
{
    $.ajax('/admin/shop/product/update-is-active', {
        type: "post",
        dataType: "json",
        data: {
            token: $(el).attr('data-token'),
            ids: $('#grid-product').yiiGridView('getSelectedRows'),
            'switch': status_id
        },
        success: function (data) {
            common.notify(data.message, 'success');
            $('#grid-product').yiiGridView('applyFilter');
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
    return false;
}

/**
 * Display window with all categories list.
 *
 * @param el_clicked
 */
function showCategoryAssignWindow(el_clicked) {
    var confirmRequest;
    if ($("#set_categories_dialog").length == 0)
    {
        var div = $('<div id="set_categories_dialog"/>');
        $(div).css('max-height', $(window).height() - 110 + 'px');
        $(div).attr('title', 'Назначить категории');
        $('body').append(div);
    }

    $('body').scrollTop(30);

    var dialog = $("#set_categories_dialog");
    dialog.load('/admin/shop/product/render-category-assign-window');

    dialog.dialog({
        //  position:'top',
        modal: true,
        resizable: false,
        responsive: true,
        width: 'auto',
        close: function () {
            $(this).remove();
        },
        open: function () {
            $('.ui-dialog').position({
                my: 'center',
                at: 'center',
                of: window,
                collision: 'fit'
            });

            $('.ui-widget-overlay').bind('click', function () {
                $('#set_categories_dialog').dialog('close');
            });

        },
        buttons: [{
                text: 'Назначить',
                'class': 'btn btn-primary',
                click: function () {
                    var checked = $("#jsTree_CategoryAssignTreeDialog .jstree-checked");
                    var ids = [];

                    checked.each(function (key, el) {
                        var id = $(el).attr('id').replace('node_', '').replace('_anchor', '');
                        ids.push(id);

                    });

                    if ($("#jsTree_CategoryAssignTreeDialog .jstree-clicked").parent().length == 0) {
                        $('#alert-s').html('<div class="alert alert-warning">На выбрана \'главная\' категория. Кликните на название категории, чтобы сделать ее главной.</div>');
                        return;
                    }
                    if ($(el_clicked).attr('data-question')) {
                        confirmRequest = confirm($(el_clicked).attr('data-question'));
                    }
                    if (confirmRequest) {
                        $.ajax('/admin/shop/product/assign-categories', {
                            type: "post",
                            dataType: "json",
                            data: {
                                token: common.token,
                                category_ids: ids,
                                main_category: $("#jsTree_CategoryAssignTreeDialog .jstree-clicked").parent().attr('id').replace('node_', '').replace('_anchor', ''),
                                product_ids: $('#grid-product').yiiGridView('getSelectedRows')
                            },
                            success: function (data) {
                                $(dialog).dialog("close");
                                common.notify(data.message, 'success');
                                $('#grid-product').yiiGridView('applyFilter');

                            },
                            error: function () {
                                $('#alert-s').html('<div class="alert alert-danger">Ошибка</div>');
                            }
                        });
                    }
                },
            }, {
                text: common.message.cancel,
                'class': 'btn btn-default',
                click: function () {
                    $(this).dialog("close");
                }
            }]
    });
}

function showDuplicateProductsWindow(link_clicked) {
    if ($("#duplicate_products_dialog").length == 0) {
        var div = $('<div id="duplicate_products_dialog"/>');
        $(div).attr('title', 'Копировать');
        $('body').append(div);
    }

    var dialog = $("#duplicate_products_dialog");
    dialog.load('/admin/shop/product/render-duplicate-products-window');

    var confirmRequest;

    dialog.dialog({
        modal: true,
        resizable: false,
        buttons: [{
                text: 'Копировать',
                'class': 'btn btn-primary',
                click: function () {

                    if ($(link_clicked).attr('data-question')) {
                        confirmRequest = confirm($(link_clicked).attr('data-question'));
                    }
                    if (confirmRequest) {
                        $.ajax('/admin/shop/product/duplicate-products', {
                            type: "post",
                            data: {
                                token: common.token,
                                products: $('#grid-product').yiiGridView('getSelectedRows'),
                                duplicate: $("#duplicate_products_dialog form").serialize()
                            },
                            success: function (data) {
                                $(dialog).dialog("close");
                                common.notify("Изменения сохранены. <a href='" + data + "'>Просмотреть копии продуктов.</a>", 'success');
                                // $.fn.yiiGridView.update('product-grid');
                                $('#grid-product').yiiGridView('applyFilter');
                            },
                            error: function () {
                                common.notify("Ошибка", 'error');
                            }
                        });
                    }
                }
            },
            {
                text: common.message.cancel,
                'class': 'btn btn-default',
                click: function () {
                    $(this).dialog("close");
                }
            }]
    });
}







function setProductsPrice(link_clicked) {
    if ($("#prices_products_dialog").length == 0) {
        var div = $('<div id="prices_products_dialog"/>');
        $(div).attr('title', 'Установить цену');
        $('body').append(div);
    }

    var dialog = $("#prices_products_dialog");
    dialog.load('/admin/shop/product/render-products-price-window');

    dialog.dialog({
        modal: true,
        resizable: false,
        responsive: true,
        draggable:false,
        buttons: [{
                text: 'Установить',
                'class': 'btn btn-primary',
                click: function () {

                    $.ajax('/admin/shop/product/set-products', {
                        type: "post",
                        data: {
                            token: common.token,
                            products: $('#grid-product').yiiGridView('getSelectedRows'),
                            data: $("#prices_products_dialog form").serialize()
                        },
                        success: function (data) {
                            $(dialog).dialog("close");
                            $('#grid-product').yiiGridView('applyFilter');
                            //$.fn.yiiGridView.update('product-grid');

                        },
                        error: function () {
                            common.notify("Ошибка", 'error');
                        }
                    });

                }
            }, {
                text: common.message.cancel,
                'class': 'btn btn-default',
                click: function () {
                    $(this).dialog("close");
                }
            }]
    });
    
     dialog.position({
                  my: 'center',
                  at: 'center',
                  of: window,
                  collision: 'fit'
            });
}

// Хак для отправки с диалогового окна формы через ENTER
// Оправка происходит для первый кнопки.
$(function () {
    $.extend($.ui.dialog.prototype.options, {
        create: function () {
            var $this = $(this);
            // focus first button and bind enter to it
            $this.parent().find('.ui-dialog-buttonpane button:first').focus();
            $this.keypress(function (e) {
                if (e.keyCode == $.ui.keyCode.ENTER) {
                    $this.parent().find('.ui-dialog-buttonpane button:first').click();
                    return false;
                }
            });
        }
    });
});