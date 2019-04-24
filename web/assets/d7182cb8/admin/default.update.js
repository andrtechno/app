

// Process checked categories
$("#Discount").submit(function(){
    var checked = $("#jsTree_DiscountCategoryTree li a.jstree-checked");
    checked.each(function(i, el){
        var id = $(el).attr("id").replace('node_', '').replace('_anchor', '');

        $("#Discount").append('<input type="hidden" name="Discount[categories][]" value="' + id + '" />');
    });

});

// Check node
;(function($) {
    $.fn.checkNode = function(id) {
        $(this).bind('loaded.jstree', function () {
            $(this).jstree('check_node','node_' + id);
        });
    };
})(jQuery);