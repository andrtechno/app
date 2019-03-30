<?php

use panix\engine\Html;
?>

<?php
$this->registerJs("$('[data-toggle=\"tooltip\"]').tooltip();");
?>





<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Пароль</th>
        <th>Тип</th>
        <th>Антиспам</th>
        <th>Перенапровление</th>
        <th>Авто ответчик</th>
        <th>Опции</th>
    </tr>
    <?php foreach ($response as $data) { ?>

        <?php $this->registerJs("common.clipboard('#clipboard_{$data->id}');", yii\web\View::POS_READY, 'mailbox' . $data->id); ?>
        <tr>
            <td><?= $data->id ?></td>
            <td><?= Html::mailto($data->name, $data->name) ?></td>
            <td>

                <span id="clipboard_<?= $data->id ?>" data-clipboard-text="<?= $data->password ?>" data-toggle="tooltip" title="Нажмите, чтобы скопировать строку в буфер обмена" style="cursor: pointer;">
                    <?= $data->password ?>
                </span>
            </td>
            <td><?= $data->type ?></td>
            <td><?= $data->autospam ?></td>
            <td><?= implode('<br/>', $data->forward) ?></td>
            <td><?php print_r($data->autoresponder) ?></td>
            <td>
                <?= Html::a(Html::icon('edit'), ['/admin/hosting/hostingmailbox/edit', 'email' => $data->name]) ?>
                <?= Html::a(Html::icon('refresh'), ['/admin/hosting/hostingmailbox/clear', 'email' => $data->name]) ?>
                <?= Html::a(Html::icon('delete'), ['/admin/hosting/hostingmailbox/delete', 'email' => $data->name]) ?>
            </td>
        </tr>
    <?php } ?>
</table>
