<?php
/**
 * @var $form \panix\engine\bootstrap\ActiveForm
 * @var $model \app\modules\seo\models\SettingsForm
 */
?>

<?= $form->field($model, 'canonical')->checkbox(); ?>
<?= $form->field($model, 'title_prefix'); ?>

<?= $form->field($model, 'yandex_verification')->hint('&lt;meta name="yandex-verification" content="..." /&gt;'); ?>
