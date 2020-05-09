<?php
use panix\engine\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    //'layout' => '{sorter}{summary}{items}{pager}',
    'layout' => '{items}{pager}',
    'emptyText' => 'Empty',
    'options' => ['class' => 'list-view blog_wrapper'],
    'itemOptions' => ['class' => 'item'],
    'emptyTextOptions' => ['class' => 'alert alert-info'],
    'pager' => [
        'class' => '\panix\engine\widgets\LinkPager',
        'options'=>['class'=>'pagination justify-content-center']
    ]
]);
?>