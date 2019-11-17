<?php
/**
 * @var $provider
 * @var $itemView
 */

echo \panix\engine\widgets\ListView::widget([
    'id'=>'shop-products',
    'dataProvider' => $provider,
    'itemView' => $itemView,
    //'layout' => '{sorter}{summary}{items}{pager}',
    'layout' => '{items}{pager}',
    'options' => ['class' => 'row shop_wrapper grid_4 list-view clearfix ' . $itemView],
    'itemOptions' => ['class' => 'item col-lg-4 col-md-4 col-sm-6'],
    /*'sorter' => [
        'class' => 'yii\widgets\LinkSorter',
        'attributes' => ['price', 'sku', 'created_at']
    ],*/
    'sorter'=>false,
    'pager' => [
        'class' => \panix\wgt\scrollpager\ScrollPager::class,
        'triggerTemplate' => '<div class="ias-trigger" style="text-align: center; cursor: pointer;">{text}</div>',
        'spinnerTemplate' => '<div class="ias-spinner" style="text-align: center;"><img src="{src}" alt="" /></div>',
        'spinnerSrc' => $this->context->assetUrl . '/images/ajax.gif'

    ],
]);
