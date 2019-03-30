<?php
use panix\engine\Html;
?>

<script>
    $(function() {
        $(".addon-table .plusOne").click(function(){
            var option_name = Math.random();
            var row = $(".addon-table .copy-addon-tr").clone().removeClass('copy-addon-tr');
            row.appendTo(".addon-table tbody");
            row.find(".value").each(function(i, el){

                if(i==0){
                    $(el).attr('name', 'addons['+option_name+'][name]');
                } else if(i==1) {
                    $(el).attr('name', 'addons['+option_name+'][price]');
                }

            });
            return false;
        });
        
        $(".addon-table").delegate(".deleteRow", "click", function(){
            $(this).parent().parent().remove();

            if($(".addon-table tbody tr").length == 1)
            {
                $(".addon-table .plusOne").click();
            }
            return false;
        });
    
    });
</script>
<style type="text/css">
    table.addon-table td {
        padding: 3px;
    }
    table.addon-table input[type="text"] {
        width: 200px;
    }
    table.addon-table tr.copy-addon-tr {
        display: none;
    }

</style>
<?php
$defaultOptions = array(
    array(
    )
);
?>
<table class="addon-table table table-striped">
    <tr>
        <th style="width: 60%;" class="text-center">Название</th>
        <th style="width: 30%;" class="text-center">Цена</th>
        <th style="width: 10%;" class="text-center">
            <a class="plusOne btn btn-success" href="javascript:void(0)">
                <i class="icon-add"></i> Добавить
            </a>

        </th>
    </tr>
    <tr class="copy-addon-tr">
        <td class="text-center"><textarea name="sample" class="value form-control" id="addon_name" style="resize:none;"></textarea></td>
        <td class="text-center"><input name="sample" type="text" class="value form-control" id="addon_price" style="display:inline-block;"></td>
        <td class="text-center"><a href="javascript:void(0);" class="deleteRow btn btn-danger"><span class="icon-trashcan"></span></a></td>
    </tr>

    <?php foreach ($model->addons as $addon) {
        ?>
        <tr>
            <td class="text-center"><?= Html::textarea('addons[' . $addon->id . '][name]', $addon->name,['class'=>'form-control','style'=>'resize:none;']); ?></td>
            <td class="text-center"><?= Html::textInput('addons[' . $addon->id . '][price]', $addon->price,['class'=>'form-control','style'=>'display:inline-block;']) ?></td>
            <td class="text-center"><a href="javascript:void(0);" class="deleteRow btn btn-danger"><span class="icon-trashcan"></span></a></td>
        </tr>
    <?php } ?>
</table>

