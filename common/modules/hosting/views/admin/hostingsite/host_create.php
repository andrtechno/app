<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;

$form = ActiveForm::begin();
?>

<?= $form->field($model, 'site')->dropDownList($model->getSiteList()); ?>
<?= $form->field($model, 'subdomain')->textInput() ?>



<div class="text-center">
    <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>


