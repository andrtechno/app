<?php
use panix\engine\Html;

$config = Yii::$app->settings->get('contacts');
$app = Yii::$app->settings->get('contacts');
$phones = explode(',', $config->phone);
$emails = explode(',', $app->email);
//$imageUrl = substr(Yii::$app->getModule('admin')->assetsUrl . '/images/favicon.png',1,strlen(Yii::$app->getModule('admin')->assetsUrl . '/images/favicon.png'));
?>

<table style="width: 100%;border-bottom: 1px solid #c0c0c0;">
    <tbody>
        <tr>
            <td style="width: 50%;">
                <?php //echo Html::img($imageUrl,['width'=>46]); ?>
            </td>
            <td style="width: 50%;text-align:right;" class="text-right">
                <?php foreach ($emails as $email) { ?>
                    <?= $email ?>
                <?php } ?>
                <div>
                    <?php foreach ($phones as $phone) { ?>
                        <?= $phone ?>
                    <?php } ?>
                </div>
                <?= $config->address ?>

            </td>
        </tr>

    </tbody>
</table>

