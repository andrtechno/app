<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;


//$this->title = $this->context->getStepLabel($_REQUEST['step']);

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
        <div class="form-block clearfix">


            <?php
            $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-4 col-lg-4 col-form-label',
                        'offset' => 'col-sm-offset-4',
                        'wrapper' => 'col-sm-8 col-lg-8',
                        'error' => '',
                        'hint' => '',
                    ],
                ],
            ]);
            ?>

            <div class="form-group">
                <div class="text-center"><h4><?= Yii::t('install/default', 'ADMIN_ACCOUNT') ?></h4></div>
            </div>
            <?= $form->field($model, 'site_name'); ?>
            <?= $form->field($model, 'admin_login'); ?>
            <?= $form->field($model, 'admin_password'); ?>
            <?= $form->field($model, 'admin_email'); ?>


            <div class="form-group text-center">
                <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'db'], ['class' => 'btn btn-link']) ?>
                <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>
                <?php
                echo Html::submitButton('Prev', ['class' => 'button', 'name' => 'prev', 'value' => 'prev']);
                echo Html::submitButton('Next', ['class' => 'button', 'name' => 'next', 'value' => 'next']);
                echo Html::submitButton('Pause', ['class' => 'button', 'name' => 'pause', 'value' => 'pause']);
                echo Html::submitButton('Cancel', ['class' => 'button', 'name' => 'cancel', 'value' => 'pause']);
                ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>