$(function () {

    // Add new row
    $("#add-option-attribute").click(function () {
        var option_name = Math.random();
        var row = $(".copyMe").clone().removeClass('copyMe');

        if ($(".optionsEditTable tbody tr").length == 1) {
            $(".optionsEditTable tbody tr").addClass('hidden');
        }


        row.prependTo(".optionsEditTable tbody");
        row.find(".value").each(function (i, el) {
            $(el).attr('name', 'options[' + option_name + '][]');
        });



        return false;
    });

    // Delete row
    $(".optionsEditTable").delegate(".delete-option-attribute", "click", function () {
        $(this).parent().parent().remove();

        if ($(".optionsEditTable tbody tr").length == 1) {
            $(".optionsEditTable tbody tr").removeClass('hidden');
        }
        return false;
    });

    // On change type toggle options tab
    $("#attribute-type").change(function () {
        toggleOptionsTab($(this));
    });
    $("#attribute-type").change();


    $("form#Attribute").submit(function () {
        var el = $("#attribute-type");
        if ($(el).val() != 3 && $(el).val() != 4 && $(el).val() != 5 && $(el).val() != 6) {
            $(".optionsEditTable").remove();
        }
        return true;
    });

    /**
     * Show/hide options tab on type change
     * @param el
     */
    function toggleOptionsTab(el) {
        var optionsTab = $("#attributes-tabs li")[1];
        // Show options tab when type is dropdown or select
        if ($(el).val() == 3 || $(el).val() == 4 || $(el).val() == 5 || $(el).val() == 6) {
            $(optionsTab).show();
            $(".field-attribute-use_in_filter").show();
            $(".field-attribute-select_many").show();
        } else {
            $(optionsTab).hide();
            $(".field-attribute-use_in_filter").hide();
            $(".field-attribute-select_many").hide();
        }
    }

});