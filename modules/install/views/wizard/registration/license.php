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
            <div class="license-box">

                <?php
                $lang = strtoupper(Yii::$app->language);
                echo \yii\helpers\Markdown::process(file_get_contents(Yii::getAlias('@app/modules/install') . DIRECTORY_SEPARATOR . "LICENSE_{$lang}.md"), 'gfm');
                ?>
            </div>

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

            <?php
            echo $form->field($model, 'license_key')->hint(Yii::t('install/default', 'LICENSE_CHECK_INFO'));
            ?>
            <div class="text-center">
                <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'info'], ['class' => 'btn btn-link']) ?>
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


