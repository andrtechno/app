<?php
use yii\helpers\Html;
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


            $runner = new \panix\engine\ConsoleCommandRunner();
            $runner->run('migrate');
            $output = $runner->getOutput();
echo $output;
            $form = ActiveForm::begin([
                //  'id' => 'form',
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

            <?php
            echo $form->field($model, 'lang')->dropDownList([
                'ru' => 'Russian',
                'en' => 'English',
                'uk' => 'Ukraine',
            ])->label();
            ?>
            <div class="text-center">
                <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'info'], ['class' => 'btn btn-link']) ?>



            <?php

            echo Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success', 'name' => 'next', 'value' => 'next']);
            echo Html::submitButton('Pause', ['class' => 'btn btn-secondary', 'name' => 'pause', 'value' => 'pause']);
            echo Html::submitButton('Cancel', ['class' => 'btn btn-secondary', 'name' => 'cancel', 'value' => 'pause']);

            ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


