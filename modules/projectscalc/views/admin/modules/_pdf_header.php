<?php

use panix\engine\Html;

$config = Yii::$app->settings->get('contacts');
$app = Yii::$app->settings->get('contacts');
$phones = explode(',', $config['phone']);
$emails = explode(',', $app['email']);
?>

<table class="" style="width: 100%;border-bottom: 1px solid #c0c0c0;">
    <tbody>

        <tr>
            <td style="width: 50%;">
                <?php echo Html::img(Yii::$app->getModule('admin')->assetsUrl . '/images/favicon.png'); ?>
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
                <?= $config['address'] ?>

            </td>
        </tr>

    </tbody>
</table>

<h1 class="text-center"><?= $model->title ?></h1>

