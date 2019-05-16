<?php
$config = Yii::$app->settings->get('contacts');
$app = Yii::$app->settings->get('contacts');
$phones = explode(',', $config->phone);
$emails = explode(',', $app->email);

?>

<table class="" style="width: 100%;">
    <tbody>
        <tr>
            <td style="width: 50%;">
                <h1 class="text-center"></h1>
            </td>
            <td style="width: 50%;text-align:right;" class="text-right">
                страница {PAGENO} из {nbpg}
            </td>
        </tr>
    </tbody>
</table>

