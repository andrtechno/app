<?php

use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;

$form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal']
]);
?>
<div class="card bg-light">
    <div class="card-header">
        <h5><?= $this->context->pageName ?></h5>
    </div>
    <div class="card-body">
        <?= $form->field($model, 'url_from')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'url_to')->textInput(['maxlength' => 255]) ?>
    </div>
    <div class="card-footer text-center">
        <?= $model->submitButton(); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>


