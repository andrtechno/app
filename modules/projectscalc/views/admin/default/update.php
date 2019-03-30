
<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->context->pageName) ?></h3>
            </div>
            <div class="panel-body">

<?php
$form = ActiveForm::begin([
            'id' => strtolower(basename(get_class($model))) . '-form',
            'options' => [
                'class' => 'form-horizontal',
            ]
        ]);


$tabs = [];


$tabs[] = [
    'label' => $model::t('TAB_MAIN'),
    'content' => $this->render('_tab_main', ['form' => $form, 'model' => $model]),
    'active' => true,
    'options' => ['id' => 'main'],
];




$tabs[] = [
    'label' => $model::t('TAB_MODULES'),
    'content' => $this->render('_tab_modules', ['exclude' => $model->id, 'form' => $form, 'model' => $model]),
    'headerOptions' => [],
    'options' => ['id' => 'modules'],
];

$tabs[] = [
    'label' => $model::t('TAB_ADDONS'),
    'content' => $this->render('_tab_addons', ['exclude' => $model->id, 'form' => $form, 'model' => $model]),
    'headerOptions' => [],
    'options' => ['id' => 'addons'],
];

echo yii\bootstrap\Tabs::widget([
    //'encodeLabels'=>true,
    'items' => $tabs,
]);
?>
<div class="form-group text-center">
<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>



<?php
ActiveForm::end();
?>
</div></div>