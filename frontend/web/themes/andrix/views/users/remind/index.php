
<h1><?php echo $this->pageName; ?></h1>




<?php
echo Html::form();
echo Html::errorSummary($model, '<i class="fa fa-warning fa-3x"></i>', null, array('class' => 'errorSummary alert alert-danger'));
?>


<?= Html::activeLabel($model, 'email', array('required' => true)); ?>


<div class="input-group">
    <span class="input-group-addon">
        <span class="fa fa-envelope"></span>
    </span>
    <?= Html::activeTextField($model, 'email', array('placeholder' => $model->getAttributeLabel('email'), 'class' => 'form-control','style'=>'width:320px')); ?>
</div>
<br/>
<input type="submit" class="btn btn-primary" value="<?php echo Yii::t('UsersModule.core', 'Напомнить'); ?>">
<br/><br/>
<ul class="list-unstyled">
    <li><?//= Html::link(Yii::t('UsersModule.default', 'REGISTRATION'), array('/users/register')); ?></li>
    <li><?//= Html::link(Yii::t('UsersModule.default', 'AUTH'), array('/users/login')); ?></li>
</ul>

<?= Html::endForm(); ?>
