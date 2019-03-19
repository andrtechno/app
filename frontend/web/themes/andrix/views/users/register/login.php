<?php
echo Html::form($this->createUrl('/users/register'), 'post', array(
    'id' => 'user-login-form',
    'class' => 'register-form',
));
echo Html::errorSummary($model);
?>
<?php
echo Html::errorSummary($model, '<i class="fa fa-warning fa-3x"></i>', null, array('class' => 'errorSummary alert alert-danger'));
?>
<div class="form-group">
    <?= Html::activeLabelEx($model, 'login', array('class' => 'control-label')); ?>
    <?= Html::activeTextField($model, 'login', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
    <?= Html::activeLabelEx($model, 'password', array('class' => 'control-label')); ?>
    <?= Html::activePasswordField($model, 'password', array('class' => 'form-control')); ?>
</div>
<div class="form-group checkbox">
    <label>
        <?= Html::activeCheckBox($model, 'rememberMe', array('class' => 'control-label')); ?>
        <?= Yii::t('UsersModule.default', 'REMEMBER_ME') ?>
    </label>

</div>
<div class="form-group">
    <?= Html::link(Yii::t('UsersModule.default', 'REMIN_PASS'), '/users/remind', array('class' => '')); ?>
</div>

<div class="form-group text-center">
    <?= Html::submitButton(Yii::t('UsersModule.default', 'BTN_LOGIN'), array('class' => 'btn-upper btn btn-primary checkout-page-button')); ?>
</div>
<?= Html::endForm(); ?>