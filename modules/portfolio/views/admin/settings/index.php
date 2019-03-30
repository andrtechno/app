<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
?>
<?php
$form = ActiveForm::begin();

if (extension_loaded('intl')) {
    echo "true";

} else {
    echo "false";
}

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $this->context->pageName ?></h3>
    </div>
    <div class="panel-body">
        <?php
        echo yii\bootstrap\Tabs::widget([
            'items' => [
                [
                    'label' => 'Общие',
                    'content' => $this->render('_global', ['form' => $form, 'model' => $model]),
                    'active' => true,
                    'options' => ['id' => 'global'],
                ],
                [
                    'label' => 'Формат цены',
                    'content' => $this->render('_price', ['form' => $form, 'model' => $model]),
                    'headerOptions' => [],
                    'options' => ['id' => 'price'],
                ],

            ],
        ]);
?>
    </div>
    <div class="panel-footer text-center">
        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>