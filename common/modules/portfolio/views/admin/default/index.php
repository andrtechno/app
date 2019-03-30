<?php

use yii\helpers\Html;
use panix\engine\grid\GridView;
use panix\engine\widgets\Pjax;
?>


<?= \panix\ext\fancybox\Fancybox::widget(['target' => '.image a']); ?>

<?php

Pjax::begin([
    'timeout' => 50000,
    'id' => 'pjax-' . strtolower(basename($dataProvider->query->modelClass)),
    'enablePushState' => true,
    'linkSelector' => 'a:not(.linkTarget)'
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

