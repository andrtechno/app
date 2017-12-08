<?php

use panix\engine\CMS;


?>

<table style="width: 100%;" cellpadding="0" cellspacing="0">
    <tr>
        <th style="width: 50%;text-align: left;">ЗАКАЗЧИК</th>
        <th style="width: 50%;text-align: left;">ИСПОЛНИТЕЛЬ</th>
    </tr>
    <tr>
        <td valign="top" height="120"><?=$model->customer_name?><br/><?=$model->customer_text;?></td>
        <td valign="top" height="120"><?= CMS::textReplace($model->redaction->performer_text, ['{performer}'=>$model->redaction->performer]);?></td>
    </tr>
    <tr>
        <td><?=$model->customer_name?> ____________________________</td>
        <td style="text-align: right;"><?=$model->redaction->performer?> ____________________________</td>
    </tr>
    <tr>
        <td valign="middle" height="70"></td>
        <td valign="middle" height="70" style="text-align: right;">М.П. ____________________________</td>
    </tr>
</table>