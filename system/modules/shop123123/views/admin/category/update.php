<?php


//$countries = new ShopCategory(['seo_alias' => 'root']);
//$countries->makeRoot();
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use panix\shop\models\ShopCategory;

$countries = ShopCategory::findOne(['seo_alias' => 'root']);
$children = $countries->children()->all();
//print_r($children);
foreach($children as $r){
    echo $r->seo_alias .' - '.$r->id;
    echo '<br>';
}
//$australia = new ShopCategory(['seo_alias' => 'sssss222']);
//$australia->appendTo($countries);

//$russia = new ShopCategory(['seo_alias' => 'Russia']);
//$russia->prependTo($countries);

?>




<?php


?>



<?php
echo Yii::t('shop/default', 'MODNAME');
$form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => '{label}<div class="col-sm-10">{input}{error}</div>',
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                ],
        ]);
?>

<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'seo_alias')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'description')->textArea() ?>


<div class="form-group text-center">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'CREATE') : Yii::t('app', 'UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>





<?php
/*echo \panix\engine\widgets\nestable\Nestable::widget([
    'modelClass' => 'app\system\modules\shop\models\ShopCategory',
]);*/
/*
use kartik\tree\TreeView;
echo TreeView::widget([
    // single query fetch to render the tree
    'query' => app\models\Product::find()->addOrderBy('root, lft'), 
    'headingOptions' => ['label' => 'Categories'],
    'fontAwesome' => true,     // optional
    'isAdmin' => true,         // optional (toggle to enable admin mode)
   // 'displayValue' => 1,        // initial display value
    'iconEditSettings'=> [
        'show' => 'list',
        'listData' => [
            'folder' => 'Folder',
            'file' => 'File',
            'mobile' => 'Phone',
            'bell' => 'Bell',
        ]
    ],
    'softDelete' => true,    // normally not needed to change
    //'cacheSettings' => ['enableCache' => true] // normally not needed to change
]);*/

        ?>