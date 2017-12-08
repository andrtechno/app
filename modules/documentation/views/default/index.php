<?php
use app\modules\documentation\widgets\categories\CategoriesWidget;
use yii\widgets\ListView;

?>
<?php echo CategoriesWidget::widget([]) ?>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'layout' => '{summary}{items}{pager}',
    'emptyText' => 'Empty',
    'options' => ['class' => 'row list-view'],
    'itemOptions' => ['class' => 'item'],
    'pager' => [
        'class' => \kop\y2sp\ScrollPager::className(),
        'triggerTemplate' => '<div class="ias-trigger" style="text-align: center; cursor: pointer;"><a href="javascript:void(0)">{text}</a></div>'
    ],
    'emptyTextOptions' => ['class' => 'alert alert-info']
]);
?>
