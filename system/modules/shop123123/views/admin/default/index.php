<?php

use yii\helpers\Html;
//use app\cms\grid\AdminGridView;
use panix\engine\grid\sortable\SortableGridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\pages\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>




<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


<?php Pjax::begin(); ?>
<?=
SortableGridView::widget([
    'tableOptions' => ['class' => 'table table-striped'],
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => $this->render('@app/web/themes/admin/views/layouts/_grid_layout', ['title' => $this->context->pageName]), //'{items}{pager}{summary}'
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['class' => 'text-center']
        ],
        'name',
        'price',
        ['class' => 'panix\engine\grid\ActionColumn'],
    ],
]);
?>
<?php Pjax::end(); ?>

