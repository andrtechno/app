<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;
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

        <div class="form-group"><div class="text-center"><h4><?= Yii::t('install/default', 'ADMIN_ACCOUNT') ?></h4></div></div>
        <?= $form->field($model, 'site_name'); ?>
        <?= $form->field($model, 'admin_login'); ?>
        <?= $form->field($model, 'admin_password'); ?>
        <?= $form->field($model, 'admin_email'); ?>



        <div class="panel-footer text-center">
            <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'db'], ['class' => 'btn btn-link']) ?>
            <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>

        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

