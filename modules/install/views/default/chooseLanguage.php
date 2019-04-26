<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\engine\behaviors\wizard\WizardMenu;

//$this->title = $this->context->getStepLabel($event->step);
$this->context->process = Yii::t('install/default', 'STEP', array(
    'current' => $this->context->currentStepIndex,
    'count' => $this->context->stepCount
));

?>
<?php ?>
<div class="row no-gutters">
    <div class="col-sm-3">
        <?php //echo WizardMenu::widget(); ?>
        <?php

        echo $this->context->renderMenu();
        ?>
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
            $form->field($model, 'lang')->dropDownList($model->getLangs())->label();
            ?>


            <div class="form-group  text-center">
                <?php

                echo $this->context->renderButtons();
                ?>
                <?= Html::submitButton(Yii::t('install/default', 'NEXT'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>




