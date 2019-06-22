<?php
/**
 * @var $provider
 * @var $itemView
 */
echo \yii\widgets\ListView::widget([
    //'id'=>'list-product',
    'dataProvider' => $provider,
    'itemView' => $itemView,
    //'layout' => '{sorter}{summary}{items}{pager}',
    'layout' => '{sorter}{items}{pager}',
    'emptyText' => 'Empty',
    'options' => ['class' => 'list-view clearfix2 ' . $itemView],
    'itemOptions' => ['class' => 'item product'],
    'sorter' => [
        'class' => 'yii\widgets\LinkSorter',
        'attributes' => ['price', 'sku', 'created_at']
    ],
    'pager' => [
        'class' => \panix\wgt\scrollpager\ScrollPager::class,
        'triggerTemplate' => '<div class="ias-trigger" style="text-align: center; cursor: pointer;">{text}</div>',
        'spinnerTemplate' => '<div class="ias-spinner" style="text-align: center;"><img src="{src}" alt="" /></div>',
        'spinnerSrc' => $this->context->assetUrl . '/images/ajax.gif'

    ],
    'emptyTextOptions' => ['class' => 'alert alert-info']
]);
?>