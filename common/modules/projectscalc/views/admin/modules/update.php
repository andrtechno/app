<?php

use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\ext\tinymce\TinyMce;

//use Documentation
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->context->pageName) ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $form = ActiveForm::begin([
                    'options' => ['class' => 'form-horizontal'],
        ]);
        echo $form->field($model, 'title')->textInput(['maxlength' => 255]);
        echo $form->field($model, 'price')->textInput(['maxlength' => 255]);
        //echo $form->field($model, 'redaction_id')->dropdownlist(Documentation::flatTree());
        echo $form->field($model, 'type_id')->dropdownlist($model::getTypeList());
        echo $form->field($model, 'full_text')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
        ]);
        ?>
        <div class="form-group text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>