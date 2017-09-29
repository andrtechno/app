<?php
//$this->context->title = $event->sender->getStepLabel($event->step);
$this->context->process = Yii::t('install/default', 'STEP', array(
            'current' => $event->sender->currentStep,
            'count' => $event->sender->stepCount
        ));

use panix\engine\Html;
use yii\widgets\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;
?>
<?php ?>
<div class="row2">
    <div class="col-sm-3">
        <?php echo WizardMenu::widget(); ?>
    </div>
    <div class="col-sm-9">
        <div class="form-block clearfix">
            <?php
            ?>
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
                'ru' => 'RU',
                'en' => 'EN'
            ])->label();
            ?>


            <div class="panel-footer text-center">

                <?= Html::submitButton(Html::icon('check') . ' ' . Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>




