<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;

$form = ActiveForm::begin();

?>
<div class="card">
    <div class="card-header">
        <h5><?= $this->context->pageName ?></h5>
    </div>
    <div class="card-body">
        <?php
        $tabs[] = [
            'label' => $model::t('TAB_MAIN'),
            'content' => $this->render('_main', ['form' => $form, 'model' => $model]),
            'active' => true,
            'options' => ['class' => 'text-center nav-item'],
        ];
        $tabs[] = [
            'label' => $model::t('TAB_GOOGLE'),
            'content' => $this->render('_google', ['form' => $form, 'model' => $model]),
            'options' => ['class' => 'text-center nav-item'],
        ];
        $tabs[] = [
            'label' => $model::t('TAB_ROBOTS'),
            'content' => $this->render('_files', ['form' => $form, 'model' => $model]),
            'options' => ['class' => 'text-center nav-item'],
        ];
        echo \panix\engine\bootstrap\Tabs::widget([
            //'encodeLabels'=>true,
            'options' => [
                'class' => 'nav-pills'
            ],
            'items' => $tabs,
        ]);
        ?>
    </div>
    <div class="card-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>