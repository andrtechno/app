<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;
use yii\helpers\Markdown;

//\yii\helpers\VarDumper::dump($event,10,true);die;

//$this->title = $this->context->getStepLabel($_REQUEST['step']);
$this->context->process = Yii::t('install/default', 'STEP', array(
    'current' => $this->context->currentStepIndex,
    'count' => $this->context->stepCount
));
?>
<div class="row no-gutters">
    <div class="col-sm-3">
        <?php //echo WizardMenu::widget(); ?>
        <?php

        echo $this->context->renderMenu();
        ?>
    </div>
    <div class="col-sm-9">
        <div class="form-block clearfix">


            <?php
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
                ],
            ]);
            ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class=" license-box">

                        <?php
                        $lang = strtoupper(Yii::$app->language);
                        echo Markdown::process(file_get_contents(Yii::getAlias('@app/modules/install') . DIRECTORY_SEPARATOR . "LICENSE_{$lang}.md"), 'gfm');
                        ?>
                    </div>
                </div>
            </div>

            <?=
            $form->field($model, 'license_key')->hint(Yii::t('install/default', 'LICENSE_CHECK_INFO'));
            ?>


            <div class="form-group text-center">
                <?php

                echo $this->context->renderButtons();
                ?>
                <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'chooseLanguage'], ['class' => 'btn btn-link']) ?>
                <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>