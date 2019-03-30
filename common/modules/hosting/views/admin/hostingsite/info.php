
<?php

use panix\engine\Html;

//print_r($response);die;
?>

<table class="table table-bordered table-striped">
    <tr>
        <th>name</th>
        <th>info</th>
    </tr>
    <?php
    foreach ($response as $site => $data) {
        //print_r($data);die;
        ?>
        <tr>
            <td><?= $data->name ?></td>
            <td>
                <?php foreach ($data->hosts as $host) { ?>
                    <div><?= $host->name; ?><br/></div>
                    <div><?= $host->fqdn; ?><br/></div>
                    <div><?= Html::a($host->service, $host->service); ?><br/></div>
                <?php } ?>       
            </td>
        </tr>
    <?php } ?>
</table>
