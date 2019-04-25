<?php
use panix\engine\grid\GridView;
use panix\engine\widgets\Pjax;

Pjax::begin([
    'id' => 'pjax-grid-redirects',
]);
echo GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;', 'class' => 'text-center'],
    'layoutOptions' => [
        'title' => $this->context->pageName
    ],
    'columns' => [
        ['class' => 'panix\engine\grid\columns\CheckboxColumn'],
        'url_from',
        'url_to',
        [
            'class' => 'panix\engine\grid\columns\ActionColumn',
            'template' => '{update} {switch} {delete}'
        ]
    ]
]);
Pjax::end();