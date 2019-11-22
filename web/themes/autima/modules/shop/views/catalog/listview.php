<?php
/**
 * @var $provider
 * @var $itemView
 */


$itemClass = ($itemView == '_view_list') ? 'col-12' : 'col-lg-4 col-md-4 col-sm-6';
echo \panix\engine\widgets\ListView::widget([
    'id' => 'shop-products',
    'dataProvider' => $provider,
    'itemView' => $itemView,
    //'layout' => '{sorter}{summary}{items}{pager}',
    'layout' => '{items}{pager}',
    'options' => ['class' => 'list-view clearfix row shop_wrapper ' . $itemView], //row shop_wrapper
    'itemOptions' => ['class' => 'item '.$itemClass],
    /*'sorter' => [
        'class' => 'yii\widgets\LinkSorter',
        'attributes' => ['price', 'sku', 'created_at']
    ],*/
    'pager' => [
        'class' => \panix\wgt\scrollpager\ScrollPager::class,
        'triggerTemplate' => '<div class="'.$itemClass.' ias-trigger" style="text-align: center; cursor: pointer;"><div class="single_product">{text}</div></div>',
        'spinnerTemplate' => '<div class="'.$itemClass.' ias-spinner" style="text-align: center;"><div class="single_product"><img src="{src}" alt="" /></div>',
        'noneLeftTemplate' => '<div class="'.$itemClass.' ias-noneleft" style="text-align: center;"><div class="single_product">{text}</div></div></div>',
        'spinnerSrc' => $this->context->assetUrl . '/images/ajax.gif'

    ],
]);
