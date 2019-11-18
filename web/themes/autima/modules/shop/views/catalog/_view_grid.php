<?php

use panix\engine\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="single_product">
    <div class="product_name grid_name">
        <h3><?= Html::a(Html::encode($model->name), $model->getUrl(), []) ?></h3>
        <?php if($model->manufacturer){ ?>
        <p class="manufacture_product"><?= Html::a(Html::encode($model->manufacturer->name), $model->manufacturer->getUrl(), []) ?></p>
        <?php } ?>
    </div>
    <div class="product_thumb">
        <?php
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'primary_img']);
        echo Html::a(Html::img('/uploads/new-image1.jpg', ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'secondary_img']);

        ?>

        <div class="label_product">
            <span class="label_sale">-47%</span>
            <span class="label_sale">-47%</span>
        </div>
        <div class="action_links">
            <ul>
                <?php
                if (Yii::$app->hasModule('compare')) {
                    echo '<li class="compare">';
                    echo \panix\mod\compare\widgets\CompareWidget::widget([
                        'pk' => $model->id,
                        'skin' => 'icon',
                        'linkOptions' => ['class' => 'btn2 btn-compare2']
                    ]);
                    echo '</li>';
                }
                if (Yii::$app->hasModule('wishlist') && !Yii::$app->user->isGuest) {
                    echo '<li class="wishlist">';
                    echo \panix\mod\wishlist\widgets\WishlistWidget::widget([
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
    <?= $model->beginCartForm(); ?>
    <div class="product_content grid_content">
        <div class="content_inner">

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


