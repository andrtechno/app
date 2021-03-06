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
    <div class="product_thumb text-center">
        <?php
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '']), $model->getUrl(), ['class' => 'primary_img']);
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
        </div>
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
                                <?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?>
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
                        echo Html::a('<span class="icon-cart"></span>', 'javascript:cart.add(' . $model->id . ')', ['class' => '', 'title' => Yii::t('cart/default', 'BUY')]);
                    } else {
                        \panix\mod\shop\bundles\NotifyAsset::register($this);
                        echo Html::a(Yii::t('shop/default', 'NOT_AVAILABLE'), 'javascript:notify(' . $model->id . ');', ['class' => 'text-danger']);
                    }
                    ?>

                </div>
                <?php
                if ($component->getUserId() === Yii::$app->user->id) {
                    echo Html::a(Yii::t('app/default', 'DELETE'), ['remove', 'id' => $model->id], [
                        'class' => 'btn btn-danger remove',
                    ]);
                } else {
                    echo 'no user';
                }

                ?>
            </div>
        </div>
    </div>
    <?= $model->endCartForm(); ?>
</div>


