
<?php



use yii\helpers\Html;
use yii\grid\GridView;
use panix\engine\widgets\Pjax;
use yii\helpers\Url;
?>

<h1>Search result</h1>
<?php
Pjax::begin([
    'timeout' => 5000,
    'id'=>  'pjax-'.strtolower(basename($dataProvider->query->modelClass)),
]);
//echo Html::beginForm(['/admin/pages/default/test'],'post',['id'=>'test','name'=>'test']);
echo GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => false,//$searchModel
   // 'layoutOptions' => ['title' => $this->context->pageName],
    'showFooter' => true,
    //   'footerRowOptions' => ['class' => 'text-center'],
    'rowOptions' => ['class' => 'sortable-column'],
    'columns'=>[
        [
            'attribute' => 'id',
            //'header' => 'name',
            'format' => 'raw',
            'contentOptions' => array('class' => 'text-left'),
            //'value' => '$data->gridName',
        ],

        'filename' => [
            'attribute' => 'filename',
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a(Html::encode($data->filename), ['/uploads/presentation/'.$data->filename]);
            },
        ],
        'slides' => [
            'attribute' => 'slides',
            // 'contentOptions' => array('class' => 'text-center'),
        ],
        'name' => [
            'attribute' => 'name',
            // 'contentOptions' => array('class' => 'text-center'),
        ],
        'width' => [
            'attribute' => 'width',
            // 'contentOptions' => array('class' => 'text-center'),
        ],
        'height' => [
            'attribute' => 'height',
            // 'contentOptions' => array('class' => 'text-center'),
        ],
        'date_create' => [
            'attribute' => 'date_create',
            //'value' => 'CMS::date($data->date_create)',
        ],

    ]
]);

Pjax::end();

//include_once Yii::getAlias('@vendor/phpoffice/phppresentation/samples').'/Sample_Header.php';
//echo $oTree->display();
//print_r($oTree->display());die;
// \Yii::$app->response->data= $oTree->display();
// if (!CLI) {
//     include_once 'Sample_Footer.php';
//  }
