<?php

use panix\engine\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="single_product">
    <div class="product_name grid_name">
        <h3><?= Html::a(Html::encode($model->name), $model->getUrl(), []) ?></h3>
        <p class="manufacture_product"><a href="#">Accessories</a></p>
    </div>
    <div class="product_thumb">
        <?php
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'primary_img']);
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'secondary_img']);

        ?>

        <div class="label_product">
            <span class="label_sale">-47%</span>
            <span class="label_sale">-47%</span>
        </div>
        <div class="action_links">
            <ul>
                <li class="wishlist">
                    <a href="wishlist.html" title="Add to Wishlist"><span
                                class="icon-heart"></span></a>
                </li>
                <li class="compare"><a href="compare.html" title="compare"><span class="icon-compare"></span></a>
                </li>
            </ul>
        </div>
    </div>
    <?= $model->beginCartForm(); ?>
    <div class="product_content grid_content">
        <div class="content_inner">
            <div class="product_ratings">
                <ul>
                    <li><a href="#"><i class="icon-star"></i></a></li>
                    <li><a href="#"><i class="icon-star"></i></a></li>
                    <li><a href="#"><i class="icon-star"></i></a></li>
                    <li><a href="#"><i class="icon-star"></i></a></li>
                    <li><a href="#"><i class="icon-star"></i></a></li>
                </ul>
            </div>
            <div class="product_footer d-flex align-items-center">
                <div class="price_box">

                    <?php
                    $priceClass = ($model->appliedDiscount) ? 'old_price' : 'current_price';
                    if (Yii::$app->hasModule('discounts')) {
                        if ($model->appliedDiscount) {
                            ?>

                            <div>
                                    <span class="current_price">
                                            <?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?>
                                        <sub><?= Yii::$app->currency->active['symbol'] ?></sub>
                                    </span>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div>
                        <span class="<?= $priceClass; ?>"><?= $model->priceRange() ?> <?= Yii::$app->currency->active['symbol'] ?></span>
                    </div>


                </div>
                <div class="add_to_cart">
                    <?php
                    if ($model->isAvailable) {
                        echo Html::a('<span class="icon-cart"></span>', 'javascript:cart.add(' . $model->id . ')', ['class' => '', 'title' => Yii::t('cart/default', 'BUY')]);
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


