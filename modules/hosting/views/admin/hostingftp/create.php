<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('hosting/default', 'HOSTINGFTP_CREATE') ?></h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'account')->dropDownList($model->getAccounts(), ['disabled' => (Yii::$app->request->get('account')) ? true : false]); ?>
        <?= $form->field($model, 'login')->textInput(['disabled' => (Yii::$app->request->get('login')) ? true : false,'maxlength' => 16 - strlen(Yii::$app->settings->get('hosting', 'account')) - 1]); ?>
        <?= $form->field($model, 'password')->hint($model::t('HINT_PASSWORD')); ?>
        <?= $form->field($model, 'homedir')->hint($model::t('HINT_HOMEDIR')); ?>
        <?= $form->field($model, 'readonly')->checkbox(); ?>
        <div class="form-group text-center">
            <?= Html::submitButton(Yii::t('app', 'CREATE'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>







