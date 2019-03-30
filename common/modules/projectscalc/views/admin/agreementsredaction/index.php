<?php

use panix\engine\grid\GridView;
use panix\engine\widgets\Pjax;

?>


<?php
Pjax::begin([
    'timeout' => 5000,
    'id'=>  'pjax-'.strtolower(basename($dataProvider->query->modelClass)),
]);
echo GridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layoutOptions' => ['title' => $this->context->pageName],
    'showFooter' => true,
     //   'footerRowOptions' => ['class' => 'text-center'],
    'rowOptions' => ['class' => 'sortable-column']
]);

 Pjax::end();
 ?>
