<?php

use panix\engine\Html;
use panix\engine\bootstrap\ActiveForm;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use panix\mod\shop\models\ProductType;
?>



<a href="javascript:void(0)" id="testclick">dsadasds</a>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->context->pageName) ?></h3>
    </div>
    <div class="panel-body">



        <?php


                $form = ActiveForm::begin([
                            'id' => strtolower(basename(get_class($model))).'-form',
                            'options' => [
                                'class' => 'form-horizontal',
                                'enctype' => 'multipart/form-data'
                            ]
                ]);

                echo yii\bootstrap\Tabs::widget([
                    //'encodeLabels'=>true,
                    'items' => [
                        [
                            'label' => $model::t('TAB_MAIN'),
                            'content' => $this->render('tabs/_main', ['form' => $form, 'model' => $model]),
                            'active' => true,
                            'options' => ['id' => 'main'],
                        ],
                        [
                            'label' => 'Изображение',
                            'content' => $this->render('tabs/_images', ['form' => $form, 'model' => $model]),
                            'headerOptions' => [],
                            'options' => ['id' => 'images'],
                        ],
                    ],
                ]);
                ?>
                <div class="form-group text-center">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>



                <?php
                ActiveForm::end();
 

        ?>
    </div>
</div>

