<?php

use yii\helpers\Html;
use panix\engine\bootstrap\ActiveForm;
use panix\ext\tinymce\TinyMce;

$this->registerJs("$('[data-toggle=\"tooltip\"]').tooltip();");
?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9">


        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->context->pageName) ?></h3>
            </div>
            <div class="panel-body">
                <?php
                $form = ActiveForm::begin([
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                'horizontalCssClasses' => [
                                    'label' => 'col-sm-12',
                                    'offset' => '',
                                    'wrapper' => 'col-sm-12',
                                    'error' => '',
                                    'hint' => ''
                                ]
                            ]
                ]);


                echo $form->field($model, 'performer')->textInput(['maxlength' => 255]);
                echo $form->field($model, 'performer_text')->widget(TinyMce::className(), [
                    'options' => ['rows' => 6],
                ]);
                echo $form->field($model, 'text')->widget(TinyMce::className(), [
                    'options' => ['rows' => 6],
                ]);
                ?>

                <div class="form-group text-center">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->context->pageName) ?></h3>
            </div>
            <div class="panel-body">

                <div id="content_manual">
                    <div class="form-horizontal">
                        <?php
                        foreach ($this->context->tpl_keys as $k => $code) {
                            $this->registerJs("common.clipboard('#clipboard{$k}');", yii\web\View::POS_READY, 'clipboard' . $k);
                            ?>

                            <div class="row form-group">
                                <div class="col-sm-12 col-md-12" data-toggle="tooltip" data-placement="left" title="<?= Yii::t('projectscalc/manual', $code) ?>"><code id="clipboard<?= $k ?>" data-clipboard-text="<?= $code ?>" style="cursor: pointer;"><?= $code ?></code></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>