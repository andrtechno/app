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
    'options' => ['class' => 'list-view ' . $itemView],
    'itemOptions' => ['class' => 'item product'],
    'sorter' => [
        'class' => 'yii\widgets\LinkSorter',
        'attributes' => ['price', 'sku', 'created_at']
    ],
    'pager' => [
        'class' => \panix\wgt\scrollpager\ScrollPager::class,
        'triggerOffset' => 1,
        'triggerTemplate' => '<div class="ias-trigger"><div>{text}</div></div>',
        'spinnerTemplate' => '<div class="ias-spinner"><div>Loading...</div></div>',
    ],
]);
