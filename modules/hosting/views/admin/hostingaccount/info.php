<?php

use panix\engine\Html;
use panix\engine\CMS;

//print_r($response);die;
?>
<table class="table table-bordered table-striped">
    <tr>
        <th class="text-center">ID</th>
        <th>login</th>
        <th class="text-center">Дата окончания</th>
        <th class="text-center">Тариф</th>
        <th class="text-center">server</th>
        <th class="text-center">proxy</th>
        <th class="text-center">Использовано</th>
        <th class="text-center">Доп. услуги</th>
        <th class="text-center">Опции</th>
    </tr>
    <?php foreach ($response as $id => $data) { ?>
        <tr>
            <td class="text-center"><?= $data->id; ?></td>
            <td><?= Html::a($data->login,['/admin/hosting/hostingaccount/info','account'=>$data->login]); ?></td>
            <td class="text-center"><span class="label label-default"><?= $data->valid_untill; ?></span></td>
            <td>
                <div>Тариф: <?= $data->plan->name; ?> (<?= $data->plan->id; ?>)</div>
                <div>1 мес. <?= $data->plan->price->{1} ?> <?= $data->plan->currency; ?></div>
                <div>3 мес. <?= $data->plan->price->{3} ?> <?= $data->plan->currency; ?></div>
                <div>6 мес. <?= $data->plan->price->{6} ?> <?= $data->plan->currency; ?></div>
                <div>1 год. <?= $data->plan->price->{12} ?> <?= $data->plan->currency; ?></div>
                <div>2 года. <?= $data->plan->price->{24} ?> <?= $data->plan->currency; ?></div>
                <br>

                <div><b>Место на SSD диске:</b> <?= CMS::files_size($data->plan->quota->disc * 1024 * 1024); ?></div>
                <div><b>inode</b> <?= $data->plan->quota->inode; ?></div>
                <div><b>Сайтов</b> <?= ($data->plan->quota->sites != 999) ? $data->plan->quota->sites : 'неограниченно'; ?></div>
                <div><b>php_memory_limit</b> <?= $data->plan->quota->php_memory_limit; ?> MB</div>
            </td>
            <td>

                <div>Name:  <?= $data->server->name ?></div>
                <div>ip:  <?= CMS::ip($data->server->ip); ?></div>
                <div>is_using_proxy:  <?= $data->server->is_using_proxy ?></div>
                <div>is_extra_ip:  <?= $data->server->is_extra_ip ?></div>
                <div>country:  <?= $data->server->country ?></div>
            </td>
            <td>
                <div>ipv4:  <?= CMS::ip($data->proxy->ipv4) ?></div>
                <div>ipv6:  <?= $data->proxy->ipv6 ?></div>
            </td>
            <td>
                <div>Место на диске FTP/Mysql:  <?= CMS::files_size($data->usage->disc * 1024 * 1024) ?></div>
                <div>inode:  <?= $data->usage->inode ?></div>
                <div>Сайтов:  <?= $data->usage->sites ?></div>
            </td>
            <td>
                <?php foreach ($data->extra as $ext) { ?>
                    <span class="label label-success"><?= $ext ?></span>
                <?php } ?>


            </td>
            <td class="text-center">
                <?= Html::a(Html::icon('cart'), ['/admin/hosting/billing/pay', 'invoice' => $data->id], ['class' => 'btn btn-default']) ?>
            </td>
        </tr>
    <?php } ?>
</table>