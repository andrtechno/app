<?php
$checked = array();
$total = 0;
$fix=(false)?'disabled="disabled"':'';
foreach ($model->modules as $obj) {
    $checked[$obj->id]=true;
   $total += $obj->price;
}

//echo Html::hiddenField('ProjectsCalc[total_price]', $total);
?>

<table class="table table-striped table-bordered">
    <?php foreach (ModulesList::model()->findAll() as $name => $data) { ?>
    <?php
    $check = (isset($checked[$data->id]))?'checked="checked"':'';
    ?>
        <tr>
            <td width="30px"><input type="checkbox" name="mod[]" value="<?= $data->id ?>" <?=$fix?> <?=$check?> /></td>
            <td><?= $data->title ?></td>
            <td><?= $data->price ?> $</td>
        </tr>

    <?php } ?>
    <tfoot>
        <tr>
            <td></td>
            <td><b>Общая стоимость проекта:</b></td>
            <td><span class="label label-success"><?=$model->total_price?> $</span></td>
        </tr>
    </tfoot>
</table>

