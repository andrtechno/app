<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
?>
<?php
$form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
        ]);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $this->context->pageName ?></h3>
    </div>
    <div class="panel-body">

        <?= $form->field($model, 'canonical')->checkbox(); ?>






    </div>
    <div class="panel-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>