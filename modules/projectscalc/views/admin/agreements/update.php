<?php
use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\ext\tinymce\TinyMce;
use yii\helpers\ArrayHelper;
use app\modules\projectscalc\models\AgreementsRedaction;


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


            echo $form->field($model, 'customer_name')->textInput(['maxlength' => 255]);

            echo $form->field($model, 'customer_text')->widget(TinyMce::class, [
                'options' => ['rows' => 6],
            ]);
            //echo $form->field($model, 'customer_text')->textarea();
            echo $form->field($model, 'redaction_id')->dropdownlist(ArrayHelper::map(AgreementsRedaction::find()->all(), 'id', 'id'));


            //  echo $form->field($model, 'calc_id')->dropdownlist(ArrayHelper::map(ProjectsCalc::find()->all(), 'id', 'id'));
            echo $form->field($model, 'customer_is')->dropdownlist([0 => 'Физическое лицо', 1 => 'Юридическое лицо']);
            ?>
            <?= $form->field($model, 'programming_days')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'layouts_days')->textInput(['maxlength' => 255]) ?>


        </div>
        <div class="card-footer text-center">
            <?= $model->submitButton() ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>