

<?php

use panix\engine\Html;

print_r($response);die;
?>
<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>password</th>
        <th>type</th>
        <th>autospam</th>
        <th>forward</th>
        <th>autoresponder</th>
        <th>Опции</th>
    </tr>
    <?php foreach ($response as $data) { ?>
        <tr>
            <td><?= $data->id ?></td>
            <td><?= $data->name ?></td>
            <td><?= $data->password ?></td>
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
