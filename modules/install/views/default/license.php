<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;
use yii\helpers\Markdown;

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


        <div class="panel-footer text-center">
            <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'chooseLanguage'], ['class' => 'btn btn-link']) ?>
            <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

