<?php
use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use app\modules\projectscalc\models\ProjectsCalc;
use yii\helpers\ArrayHelper;
use app\modules\projectscalc\models\AgreementsRedaction;
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

        echo $form->field($model, 'redaction_id')->dropdownlist(ArrayHelper::map(AgreementsRedaction::find()->all(), 'id', 'id'));


        echo $form->field($model, 'calc_id')->dropdownlist(ArrayHelper::map(ProjectsCalc::find()->all(), 'id', 'id'));




        ?>

        <div class="form-group text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

