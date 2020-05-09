<?php

use panix\engine\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var \panix\mod\shop\models\Product $model
 */


?>

<div class="single_product">

    <div class="product_thumb text-center">
        <?php
        //$model->getMainImage('340x265')->url
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'primary_img', 'data-pjax' => 0]);
        //echo Html::a(Html::img('/uploads/new-image1.jpg', ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'secondary_img']);

        ?>

        <div class="label_product">
            <?php
            // \panix\engine\CMS::dump($model->labels());die;
            foreach ($model->labels() as $key => $label) {
                $options['class'] = 'badge badge-' . $label['class'].' '.$key;
                if (isset($label['title'])) {
                    $options['data-toggle'] = 'tooltip';
                    $options['title'] = $label['title'];
                }

                echo '<div>';
                echo Html::tag('span', $label['value'], $options);
                echo '</div>';
            }
            ?>
        </div>
        <div class="action_links">
            <ul>
                <?php
                /* if (Yii::$app->hasModule('compare')) {
                     echo '<li class="compare">';
                     echo \panix\mod\compare\widgets\CompareWidget::widget([
                         'pk' => $model->id,
                         'skin' => 'icon',
                         'linkOptions' => ['class' => 'btn2 btn-compare2']
                     ]);
                     echo '</li>';
                 }*/
                if (Yii::$app->hasModule('wishlist')) {
                    echo '<li class="wishlist">';
                    echo \panix\mod\wishlist\widgets\WishListWidget::widget([
                        'pk' => $model->id,
                        'skin' => 'icon',
                        'linkOptions' => ['class' => 'btn2 btn-wishlist']
                    ]);
                    echo '</li>';
                }
                ?>

            </ul>
        </div>
    </div>
	    <div class="product_name grid_name">
        <h3><?= Html::a(Html::encode($model->name), $model->getUrl(), ['data-pjax' => 0]) ?></h3>
        <?php if ($model->manufacturer_id) { ?>
            <p class="manufacture_product"><?= Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), ['data-pjax' => 0]) ?></p>
        <?php } ?>
    </div>
    <?= $model->beginCartForm(); ?>
    <div class="product_content grid_content">
        <div class="content_inner">

            <div class="product_footer d-flex align-items-center">
                <div class="price_box">

                    <?php
                    $priceClass = ($model->hasDiscount) ? 'current_price' : 'old_price';
                    if ($model->hasDiscount) {
                        ?>

                        <div>
                            <span class="old_price">
                                <?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice,$model->currency_id)) ?>
                                <?= Yii::$app->currency->active['symbol'] ?>
                            </span>
                        </div>
                    <?php } ?>
                    <div>
                        <span class="current_price"><?= $model->priceRange() ?> <?= Yii::$app->currency->active['symbol'] ?></span>
                    </div>


                </div>
                <div class="add_to_cart">
                    <?php
                    if ($model->isAvailable) {
                        echo Html::a(Html::icon('cart'), 'javascript:cart.add(' . $model->id . ')', ['class' => '', 'title' => Yii::t('cart/default', 'BUY')]);
                    } else {
                        \panix\mod\shop\bundles\NotifyAsset::register($this);
                        echo Html::a(Yii::t('shop/default', 'NOT_AVAILABLE'), 'javascript:notify(' . $model->id . ');', ['class' => 'text-danger']);
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?= $model->endCartForm(); ?>
</div>


