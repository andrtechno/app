<?php

use app\modules\projectscalc\models\ModulesList;

$checked = array();
$fix = (false) ? 'disabled="disabled"' : '';
foreach ($model->modules as $obj) {
    $checked[$obj->id] = true;
}
$list = ModulesList::getTypeList();
?>

<table class="table table-striped table-bordered">
    <tr>
        <th class="text-center"></th>
        <th class="text-center">Название</th>
        <th class="text-center">Тип</th>
        <th class="text-center">Цена</th>
        <th class="text-center"><?= Yii::t('app', 'OPTIONS'); ?></th>
    </tr>
    <?php foreach (ModulesList::find()->all() as $name => $data) { ?>
        <?php
        $check = (isset($checked[$data->id])) ? 'checked="checked"' : '';
        ?>
        <tr>
            <td width="30px"><input type="checkbox" name="mod[]" value="<?= $data->id ?>" <?= $fix ?> <?= $check ?> /></td>
            <td><?= $data->title ?></td>
            <td class="text-center"><?= $list[$data->type_id]; ?></td>
            <td class="text-center"><?= $data->price ?> $</td>

            <td class="text-center"></td>
        </tr>

    <?php } ?>
</table>

