<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\system\modules\shop\models\ShopManufacturer;
use app\system\modules\shop\models\ShopCategory;
use panix\tinymce\TinyMce;
use yii\bootstrap\Dropdown;

/* @var $this yii\web\View */
/* @var $model app\modules\pages\models\Pages */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->context->pageName) ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $form = ActiveForm::begin([
         /*           'layout' => 'horizontal',
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-4',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-sm-8',
                            'error' => '',
                            'hint' => '',
                        ],
                    ],
                    'options' => ['class' => 'form-horizontal']*/
        ]);
        ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'seo_alias')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'sku')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'price')->textInput(['maxlength' => 10]) ?>

<?php


    echo $form->field($model, 'manufacturer_id')->dropDownList(ArrayHelper::map(ShopManufacturer::find()->all(),'id','name'),[
        'prompt' => 'Укажите производителя'
    ]);
    
    
    echo $form->field($model, 'category_id')->dropDownList(ShopCategory::flatTree(),[
        'prompt' => 'Укажите категорию'
    ]);
?>
        <?=
        $form->field($model, 'full_description')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
        ?>
<div class="dropdown">
    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Label <b class="caret"></b></a>
    <?php
        echo Dropdown::widget([
            'items' => [
                ['label' => 'DropdownA', 'url' => '/'],
                ['label' => 'DropdownB', 'url' => '#'],
            ],
        ]);
    ?>
</div>

        <div class="form-group text-center">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        


<?php
	foreach($model->getEavAttributes()->all() as $attr){
		//print_r($attr);
            echo $attr->name;
               echo  $form->field($model,$attr->name, ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput();
	}


	

?>
        
        <?php ActiveForm::end(); ?>



    </div>
</div>


<?= \mirocow\eav\admin\widgets\Fields::widget([
		'model' => $model,
		'categoryId' => $model->id,
		'entityName' => 'product',
		'entityModel' => 'app\system\modules\shop\models\ShopProduct',
])?>