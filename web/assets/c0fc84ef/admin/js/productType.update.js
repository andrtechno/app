

// Connect lists
$("#box2View").delegate('option', 'dblclick', function(){
    var clon = $(this).clone();
    $(this).remove();
    $(clon).appendTo($("#box1View"));
});
$("#box1View").delegate('option', 'dblclick', function(){
    var clon = $(this).clone();
    $(this).remove();
    $(clon).appendTo($("#box2View"));
});


// Process checked categories
$("#ProductTypeForm").submit(function(){

    $("#box2View option").prop('selected', true);
    var checked = $("#jsTree_TypeCategoryTree li a.jstree-checked");
    checked.each(function(i, el){
        var id = $(el).attr("id").replace('node_', '').replace('_anchor', '');
        $("#ProductTypeForm").append('<input type="hidden" name="categories[]" value="' + id + '" />');
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


// Process main category
$('#jsTree_TypeCategoryTree').delegate("a", "click", function (event) {

    $('#jsTree_TypeCategoryTree').jstree(true).check_node($(this).attr('id').replace('_anchor', ''));
  //  $('#ShopTypeCategoryTree').jstree(true).select_node($(this).attr('id').replace('_anchor', ''));
    var id = $(this).parent("li").attr('id').replace('node_', '');

    $('#main_category').val(id);
});
