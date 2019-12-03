<?php

use panix\engine\Html;
use yii\helpers\HtmlPurifier;

/**
 * @var \panix\mod\shop\models\Product $model
 */
?>

<div class="single_product">
    <div class="product_name grid_name">
        <h3><?= Html::a(Html::encode($model->name), $model->getUrl(), ['data-pjax'=>0]) ?></h3>
        <?php if ($model->manufacturer) { ?>
            <p class="manufacture_product"><?= Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), ['data-pjax'=>0]) ?></p>
        <?php } ?>
    </div>
    <div class="product_thumb text-center">
        <?php
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'primary_img','data-pjax'=>0]);
        //echo Html::a(Html::img('/uploads/new-image1.jpg', ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'secondary_img']);

        ?>

        <div class="label_product">
            <?php
            foreach ($model->labels() as $label) {
                echo '<div>';
                echo Html::tag('span', $label['value'], [
                    'class' => 'badge badge-' . $label['class'],
                    'data-toggle' => 'tooltip',
                    // 'title' => $label['tooltip']
                ]);
                echo '</div>';
            }
            ?>
            <!--<span class="label_sale">-47%</span>-->
        </div>
        <div class="action_links">
            <ul>


            </ul>
        </div>
    </div>
    <?= $model->beginCartForm(); ?>



    <div class="product_content list_content">
        <div class="left_caption">
            <div class="product_name">
                <h3><?= Html::a(Html::encode($model->name), $model->getUrl(), []) ?></h3>
            </div>
            <div class="product_ratings">
                <ul>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                    <li><a href="#"><i class="ion-star"></i></a></li>
                </ul>
            </div>

            <div class="product_desc">
                <p></p>
            </div>
        </div>
        <div class="right_caption">
            <div class="text_available">
                <div><?= $model->getAttributeLabel('availability') ?>:

                    <?php if ($model->availability == 1) { ?>
                        <span class="text-success"><?= $model::getAvailabilityItems()[$model->availability]; ?></span>
                    <?php } elseif ($model->availability == 3) { ?>
                        <span class="text-warning"><?= $model::getAvailabilityItems()[$model->availability] ?></span>
                    <?php } else { ?>
                        <span class="text-danger"><?= $model::getAvailabilityItems()[$model->availability] ?></span>
                    <?php } ?>
                </div>
                <?php if ($model->sku) { ?>
                    <span><?= $model->getAttributeLabel('sku') ?>: <a
                                href="#"><?= Html::encode($model->sku); ?></a></span>
                <?php } ?>
                <?php if ($model->manufacturer) { ?>
                    <span><?= $model->getAttributeLabel('manufacturer_id') ?>:
                        <?= Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), ['title' => $model->getAttributeLabel('manufacturer_id'), 'class' => "manufacturer-popover"]); ?></span>
                <?php } ?>
            </div>
            <div class="price_box">
                <?php
                $priceClass = ($model->appliedDiscount) ? 'current_price' : 'old_price';
                if ($model->appliedDiscount) {
                    ?>

                    <div>
                            <span class="old_price">
                                <?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?>
                                <?= Yii::$app->currency->active['symbol'] ?>
                            </span>
                    </div>
                <?php } ?>
                <div>
                    <span class="current_price"><?= $model->priceRange() ?> <?= Yii::$app->currency->active['symbol'] ?></span>
                </div>

            </div>
            <div class="cart_links_btn">
                <?php
                if ($model->isAvailable) {
                    echo Html::a(Html::icon('cart'), 'javascript:cart.add(' . $model->id . ')', ['class' => '', 'title' => Yii::t('cart/default', 'BUY')]);
                } else {
                    \panix\mod\shop\bundles\NotifyAsset::register($this);
                    echo Html::a(Yii::t('shop/default', 'NOT_AVAILABLE'), 'javascript:notify(' . $model->id . ');', ['class' => 'text-danger']);
                }
                ?>
            </div>
            <div class="action_links_btn">
                <ul>
                    <?php
                    if (Yii::$app->hasModule('wishlist') && !Yii::$app->user->isGuest) {
                        echo '<li class="wishlist">';
                        echo \panix\mod\wishlist\widgets\WishListWidget::widget([
                            'pk' => $model->id,
                            'skin' => 'icon',
                            'linkOptions' => ['class' => 'btn2 btn-wishlist2']
                        ]);
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>



    <?= $model->endCartForm(); ?>
</div>


