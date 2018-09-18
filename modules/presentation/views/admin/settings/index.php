<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $this->context->pageName ?></h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'auth_login') ?>
        <?= $form->field($model, 'auth_token') ?>
        <?= $form->field($model, 'account') ?>


        <div class="panel-footer text-center">
            <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>

