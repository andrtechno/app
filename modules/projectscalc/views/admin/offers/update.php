<?php
use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use app\modules\projectscalc\models\ProjectsCalc;
use yii\helpers\ArrayHelper;
use app\modules\projectscalc\models\AgreementsRedaction;
?>
<?php
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
        echo $form->field($model, 'redaction_id')->dropdownlist(ArrayHelper::map(AgreementsRedaction::find()->all(), 'id', 'id'));
        echo $form->field($model, 'calc_id')->dropdownlist(ArrayHelper::map(ProjectsCalc::find()->all(), 'id', 'id'));
        ?>
    </div>
    <div class="card-footer text-center">
        <?= $model->submitButton(); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
