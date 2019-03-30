<?php

use panix\engine\bootstrap\ActiveForm;
use panix\engine\Html;
use panix\ext\taginput\TagInput;

$form = ActiveForm::begin();
?>
<?php
if(Yii::$app->request->get('email')){
echo Yii::$app->request->get('email');
              
}else{
     echo  $form->field($model, 'mailbox');
}
?>
<?= $form->field($model, 'password')->textInput(['minlength' => 8]); ?>
<?= $form->field($model, 'antispam')->dropDownList($model->antispamArray); ?>
<?= $form->field($model, 'type')->dropDownList($model->typeArray); ?>
<?=
        $form->field($model, 'forward')
        ->widget(TagInput::className(), ['placeholder' => 'E-mail'])
        ->hint('Введите E-mail и нажмите Enter');
?>
<?= $form->field($model, 'autoresponder')->checkbox(); ?>
<?= $form->field($model, 'autoresponder_title'); ?>
<?= $form->field($model, 'autoresponder_text')->textarea(); ?>



<div class="text-center">
    <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>


<?php if ($response) { ?>
    <?php print_r($response); ?>

<?php } ?>

