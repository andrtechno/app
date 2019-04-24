
// Process checked categories

$("#product-form").submit(function () {
    var checked = $("#jsTree_CategoryTree li a.jstree-checked");
    checked.each(function (i, el) {
        var id = $(el).attr("id").replace('node_', '').replace('_anchor', '');
        console.log(id);
        $("#product-form").append('<input type="hidden" name="categories[]" value="' + id + '" />');
    });
});


//$('#ShopCategoryTree').delegate("a", "click", function (event) {
//	$('#ShopCategoryTree').jstree('checkbox').check_node($(this));
//	var id = $(this).parent("li").attr('id').replace('ShopCategoryTreeNode_', '');
//});

;
(function ($) {
    $.fn.checkNode = function (id) {

        $(this).bind('loaded.jstree', function () {
            $(this).jstree('check_node', 'node_' + id);
        });
    };
})(jQuery);

// On change `use configurations` select - load available attributes
$('#product-use_configurations, #product-type_id').change(function () {
    var attrs_block = $('#availableAttributes');
    var type_id = $('#product-type_id').val();
    attrs_block.html('');

    if ($('#product-use_configurations').val() == '0')
        return;

    $.getJSON('/admin/shop/product/load-configurable-options?type_id=' + type_id, function (data) {
        var items = [];
        if (data.status === 'success') {
            $.each(data.response, function (key, option) {
                items.push('<li><label class="control-label"><input type="checkbox" class="check" name="Product[configurable_attributes][]" value="' + option.id + '" name=""> ' + option.title + '</label></li>');
            });
            $('#availableAttributes').removeClass('hidden');
            $('<ul/>', {
                'class': 'list-unstyled',
                'style': 'margin-left:20px',
                html: items.join('')
            }).appendTo(attrs_block);
        } else {
            $('#availableAttributes').html('<div class="alert alert-danger">' + data.message + '</div>').removeClass('hidden');
        }
    });
});



var price_id = Math.random();

$('.remove-price').click(function (e) {
    // e.preventDefault();
    var id = $(this).data('price-id');
    $('#price-row-'+$(this).data('price-id')).remove();
    return false;
});

$('#ShopProduct_unit').change(function(){
    $('.unit-name').text($(this).find(":selected").text());
});

$('#ShopProduct_currency_id').change(function(){
    $('.currency-name').text($(this).find(":selected").text());
});


$('#add-price').click(function (e) {
    e.preventDefault();
    var rand = parseInt(Math.random()*100000);
    var selector = $("#extra-prices");
    console.log('add price');



    selector.prepend('<div id="price-row-'+rand+'"><hr/><div class="row required">' +
        '<label class="col-sm-3 col-md-3 col-lg-2 col-form-label" for="productprices-'+rand+'-value">Цена</label>' +
        '<div class="col-sm-9 col-md-3 col-lg-3">' +
        '<div class="input-group mb-2">' +
        '<input class="form-control flashing-input" type="text" value="0.00" name="ProductPrices['+rand+'][value]" id="productprices-'+rand+'-value">' +
        '<div class="input-group-append"><span class="col-form-label ml-3"><span class="currency-name">грн.</span> за <span class="unit-name">шт.</span> <a href="#" onClick="$(\'#price-row-'+rand+'\').remove(); return false;" data-price-id="'+rand+'" class="remove-price btn btn-sm btn-danger"><i class="icon-delete"></i></a></span></div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="row required">' +
        '<label class="col-sm-3 col-md-3 col-lg-2 col-form-label" for="productprices-'+rand+'-from">При заказе от</label>' +
        '<div class="col-sm-9 col-md-3 col-lg-3">' +
        '<div class="input-group mb-3 mb-sm-0">' +
        '<input class="form-control flashing-input" type="text" value="2" name="ProductPrices['+rand+'][from]" id="productprices-'+rand+'-from">' +
        '<div class="input-group-append"><span class="col-form-label ml-3 unit-name">шт.</span></div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>');


});
