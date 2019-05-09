<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;

$this->title = 'Registration Wizard';

?>

<div class="row no-gutters">
    <div class="col-sm-3">
        <?php
        echo WizardMenu::widget([
            'step' => $event->step,
            'wizard' => $event->sender,
            'options' => [
                'class' => 'list-unstyled nav-step'
            ]
        ]);
        ?>
    </div>
    <div class="col-sm-9">
        <div class="form-block">


            <?php
            $form = ActiveForm::begin([
                //  'id' => 'form',
             //   'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-4 col-lg-4 col-form-label',
                        'offset' => 'col-sm-offset-4',
                        'wrapper' => 'col-sm-8 col-lg-8',
                        'error' => '',
                        'hint' => '',
                    ],
                ]


            ]);
            ?>


            <?= $form->field($model, 'db_host'); ?>
            <?= $form->field($model, 'db_name'); ?>
            <?= $form->field($model, 'db_user'); ?>
            <?= $form->field($model, 'db_password'); ?>
            <?= $form->field($model, 'db_prefix'); ?><a href="javascript:void(0)" onClick="$('#db-db_prefix').val(makeid());"><?= Yii::t('install/default', 'AUTO_GEN') ?></a>
            <?= $form->field($model, 'db_charset')->hint(Yii::t('install/default', 'DB_CHARSET_HINT'))->dropDownList($model->getDbCharset()); ?>
            <?= $form->field($model, 'db_type')->hint(Yii::t('install/default', 'DB_TYPE_HINT'))->dropDownList($model->getDbTypes()); ?>


            <div class="text-center">
                <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'info'], ['class' => 'btn btn-link']) ?>
                <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

