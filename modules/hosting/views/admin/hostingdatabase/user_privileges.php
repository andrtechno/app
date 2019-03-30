<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;

$form = ActiveForm::begin();
?>
<?= $form->field($model, 'database')->textInput() ?>
<?= $form->field($model, 'user')->textInput() ?>
<?= $form->field($model, 'privileges')->dropDownList($model->getPrivilegesList(),['multiple'=>'multiple']); ?>


<div class="text-center">
    <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>


