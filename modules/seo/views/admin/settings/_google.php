<?php
/**
 * @var $form \panix\engine\bootstrap\ActiveForm
 * @var $model \app\modules\seo\models\SettingsForm
 */
?>

<?= $form->field($model, 'google_site_verification')->hint('&lt;meta name="google-site-verification" content="..." /&gt;'); ?>

<?= $form->field($model, 'google_tag_manager')
    ->hint('Example: GTM-ABC1234')
    ->textInput(['maxlength'=>11]); ?>

<?= $form->field($model, 'google_tag_manager_js')
    ->textarea(['rows'=>5])
    ->hint('<code>{CODE}</code> - GTM-ABC1234');; ?>

<?= $form->field($model, 'googleanalytics_id')
    ->hint('Example: UA-1234567-00')
    ->textInput(['maxlength'=>13]); ?>

<?= $form->field($model, 'googleanalytics_js')
    ->textarea(['rows'=>6])
    ->hint('<code>{CODE}</code> - UA-1234567-00'); ?>

