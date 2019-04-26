<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;


$this->registerJs('
    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text.toLowerCase() + "_";
    }
',\yii\web\View::POS_END);

//$this->title = $this->context->getStepLabel($event->step);
$this->context->process = Yii::t('install/default', 'STEP', array(
    'current' => $this->context->currentStep,
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


            <?= $form->field($model, 'db_host'); ?>
            <?= $form->field($model, 'db_name'); ?>
            <?= $form->field($model, 'db_user'); ?>
            <?= $form->field($model, 'db_password'); ?>
            <?= $form->field($model, 'db_prefix'); ?>
            <a href="javascript:void(0)" onClick="$('#db-db_prefix').val(makeid());"><?= Yii::t('install/default', 'AUTO_GEN') ?></a>
            <?= $form->field($model, 'db_charset')->hint(Yii::t('install/default', 'DB_CHARSET_HINT'))->dropDownList($model->getDbCharset()); ?>
            <?= $form->field($model, 'db_type')->hint(Yii::t('install/default', 'DB_TYPE_HINT'))->dropDownList($model->getDbTypes()); ?>


            <div class="form-group text-center">
                <?php

                echo $this->context->renderButtons();
                ?>
                <?= Html::a(Yii::t('install/default', 'BACK'), [Yii::$app->controller->id . '/index', 'step' => 'info'], ['class' => 'btn btn-link']) ?>
                <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>