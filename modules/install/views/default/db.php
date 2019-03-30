<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;

$this->title = $event->sender->getStepLabel($event->step);
$this->context->process = Yii::t('install/default', 'STEP', array(
            'current' => $event->sender->currentStepIndex,
            'count' => $event->sender->stepCount
        ));
?>


<div class="col-sm-3">
    <?php echo WizardMenu::widget(); ?>
</div>
<div class="col-sm-9">
    <div class="form-block clearfix">


        <?php
        $form = ActiveForm::begin([
                    //  'id' => 'form',
                    'options' => ['class' => 'form-horizontal'],
        ]);
        ?>


        <?= $form->field($model, 'db_host'); ?>
        <?= $form->field($model, 'db_name'); ?>
        <?= $form->field($model, 'db_user'); ?>
        <?= $form->field($model, 'db_password'); ?>
        <?= $form->field($model, 'db_prefix'); ?><a href="javascript:void(0)" onClick="$('#db-db_prefix').val(makeid());"><?= Yii::t('install/default', 'AUTO_GEN') ?></a>
        <?= $form->field($model, 'db_charset')->hint(Yii::t('install/default', 'DB_CHARSET_HINT'))->dropDownList($model->getDbCharset()); ?>
        <?= $form->field($model, 'db_type')->hint(Yii::t('install/default', 'DB_TYPE_HINT'))->dropDownList($model->getDbTypes()); ?>


        <div class="panel-footer text-center">
            <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'info'], ['class' => 'btn btn-link']) ?>
            <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>

        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

