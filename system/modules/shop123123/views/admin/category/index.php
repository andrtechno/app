<?php

use yii\helpers\Html;
use panix\engine\grid\AdminGridView;
use app\system\modules\shop\models\ShopCategory;
use app\system\modules\shop\models\ShopCategoryNode;

$user = Yii::$app->getModule("shop")->model("ShopProduct");
$manufacturer = Yii::$app->getModule("shop")->model("ShopManufacturer");


$countries = ShopCategory::findOne(1);
$parent = $countries->children()->all();

foreach(ShopCategoryNode::fromArray(ShopCategory::findOne(1)->children()->all(),['switch' => true]) as $r){
    print_r($r) ;
    echo '<br><br>';
    foreach($r['children'] as $d){
    print_r($r) ;
    echo '<br><br>';
    }
}

echo \panix\jstree\JsTree::widget([
   // 'attribute' => 'attribute_name',
   // 'model' => $model,
    'name'=>'jstree',
     'data' => ShopCategoryNode::fromArray(ShopCategory::findOne(1)->children()->all(),['switch' => true]),
    'core' => [
      //  'data' => ShopCategoryNode::fromArray(ShopCategory::findOne(1)->children()->all(),['switch' => true])
/*'data'=>[
            'Simple root node',
            [
                'id' => 'node_2',
                'text' => 'Root node with options',
                'state' => [ 'opened' => true, 'selected' => true ],
                'children' => [ [ 'text' => 'Child 1' ], 'Child 2']
            ],
    'Simple root node',
        ]*/
    ],
    'plugins' => ['types', 'dnd', 'contextmenu', 'wholerow', 'state'],

]); 

//$this->title = Yii::t('user/default', 'Users');
//$this->params['breadcrumbs'][] = $this->title;
?>
