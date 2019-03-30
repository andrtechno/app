<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;
use panix\ext\taginput\TagInput;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Yii::t('hosting/default', 'HOSTINGFTP_ACCESS_EDIT') ?></h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'account')->dropDownList($model->getAccounts(), ['disabled' => (Yii::$app->request->get('account')) ? true : false]); ?>
        <?=
                $form->field($model, 'ip')
                ->widget(TagInput::className(), ['placeholder' => 'ip'])
                ->hint($model::t('HINT_IP'));
        ?>
        <?= $form->field($model, 'active')->checkbox(); ?>
        <?= $form->field($model, 'web_ftp')->checkbox(); ?>
        <div class="form-group text-center">
            <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

195.78.247.104





