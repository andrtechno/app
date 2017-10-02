<?php

use yii\helpers\Html;
use panix\engine\widgets\Pjax;
use panix\engine\grid\GridView;

//\panix\engine\assets\ShowLoadingAsset::register($this);
?>





<?php

Pjax::begin([
    'id' => 'pjax-container',
    'enablePushState' => false,
    'linkSelector' => 'a:not(.linkTarget)'
]);
?>
<?=

GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;', 'class' => 'text-center'],

    'layout' => $this->render('@admin/views/layouts/_grid_layout', ['title' => $this->context->pageName]), //'{items}{pager}{summary}'
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['class' => 'text-center']
        ],
        'url',

        [
            'class' => 'panix\engine\grid\columns\ActionColumn',
            'template' => '{update} {switch} {delete}',
                ]
            ]
        ]);
        ?>
        <?php Pjax::end(); ?>
