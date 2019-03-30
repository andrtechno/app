<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;

$form = ActiveForm::begin();
?>
<?= $form->field($model, 'password')->textInput() ?>



<div class="text-center">
    <?= Html::submitButton(Yii::t('app', 'UPDATE'), ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>


