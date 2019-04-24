
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-change_password-form',
    'htmlOptions' => array('class' => ''))
);

if ($changePasswordForm->hasErrors())
    Yii::app()->tpl->alert('danger', Html::errorSummary($changePasswordForm));
?>


<div class="form-group">
    <?= $form->label($changePasswordForm, 'current_password', array('class' => 'control-label')); ?>
    <?= $form->passwordField($changePasswordForm, 'current_password', array('class' => 'form-control')); ?>

</div>
<div class="form-group">
    <?= $form->label($changePasswordForm, 'new_password', array('class' => 'control-label')); ?>
    <?= $form->passwordField($changePasswordForm, 'new_password', array('class' => 'form-control')); ?>

</div>

<div class="form-group">
    <?= $form->label($changePasswordForm, 'new_repeat_password', array('class' => 'control-label')); ?>
    <?= $form->passwordField($changePasswordForm, 'new_repeat_password', array('class' => 'form-control')); ?>

</div>
<div class="text-center">
    <?= Html::submitButton(Yii::t('core', 'CHANGE'), array('class' => 'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?> 
