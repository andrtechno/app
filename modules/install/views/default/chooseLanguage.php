<?php

use panix\engine\Html;
use yii\widgets\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;

$this->title = $event->sender->getStepLabel($event->step);
$this->context->process = Yii::t('install/default', 'STEP', array(
            'current' => $event->sender->currentStepIndex,
            'count' => $event->sender->stepCount
        ));
?>
<?php ?>

<div class="col-sm-3">
    <?php echo WizardMenu::widget(); ?>
</div>
<div class="col-sm-9">
    <div class="form-block clearfix">
        <?php ?>
        <?php
        $form = ActiveForm::begin([
                    //  'id' => 'form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-sm-7\">{input}</div>\n<div class=\"col-sm-7 col-sm-offset-5\">{error}</div>",
                        'labelOptions' => ['class' => 'col-sm-5 control-label'],
                    ],
        ]);
        ?>


        <?=
        $form->field($model, 'lang')->dropDownList([
            'ru' => 'Russian',
            'en' => 'English',
            'uk' => 'Ukraine',
        ])->label();
        ?>


        <div class="panel-footer text-center">
            <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>




