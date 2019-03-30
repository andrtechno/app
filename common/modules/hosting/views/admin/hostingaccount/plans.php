<?php
//print_r($response);die;
?>

<?php

use panix\engine\Html;
use panix\engine\CMS;
?>
<table class="table table-bordered table-striped">
    <tr>
        <th class="text-center">ID</th>
        <th>name</th>
        <th>Инфо</th>
        <th class="text-center">Цена</th>
        <th class="text-center">Опции</th>
    </tr>
    <?php foreach ($response as $id => $data) { ?>
        <tr>
            <td class="text-center"><?= $data->id; ?></td>
            <td><?= $data->name; ?> (<?= $data->name_billing; ?>)</td>
            <td>

                <div><b>Место на SSD диске:</b> <?= CMS::files_size($data->quota->disc * 1024 * 1024); ?></div>
                <div><b>inode</b> <?= $data->quota->inode; ?></div>
                <div><b>Сайтов</b> <?= ($data->quota->sites != 999) ? $data->quota->sites : 'неограниченно'; ?></div>
                <div><b>php_memory_limit</b> <?= $data->quota->php_memory_limit; ?> MB</div>
            </td>
            <td class="text-center">
                <div>1 мес. <?= $data->price->{1} ?> <?= $data->currency; ?></div>
                <div>3 мес. <?= $data->price->{3} ?> <?= $data->currency; ?></div>
                <div>6 мес. <?= $data->price->{6} ?> <?= $data->currency; ?></div>
                <div>1 год. <?= $data->price->{12} ?> <?= $data->currency; ?></div>
                <div>2 года. <?= $data->price->{24} ?> <?= $data->currency; ?></div>
            </td>

            <td class="text-center">
                <?= Html::a(Html::icon('cart'), ['/admin/hosting/billing/pay', 'invoice' => $data->id], ['class' => 'btn btn-default']) ?>
            </td>
        </tr>
    <?php } ?>
</table>