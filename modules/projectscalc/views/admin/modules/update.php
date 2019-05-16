<?php

use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\ext\tinymce\TinyMce;

$form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal'],
]);
?>
<div class="card">
    <div class="card-header">
        <h5><?= Html::encode($this->context->pageName) ?></h5>
    </div>
    <div class="card-body">
        <?php

        echo $form->field($model, 'title')->textInput(['maxlength' => 255]);
        echo $form->field($model, 'price')->textInput(['maxlength' => 255]);
        //echo $form->field($model, 'redaction_id')->dropdownlist(Documentation::flatTree());
        echo $form->field($model, 'type_id')->dropdownlist($model::getTypeList());
        echo $form->field($model, 'full_text')->widget(TinyMce::class, [
            'options' => ['rows' => 6],
        ]);
        ?>


    </div>
        <div class="card-footer text-center">
            <?= $model->submitButton() ?>
        </div>
</div>
<?php ActiveForm::end(); ?>