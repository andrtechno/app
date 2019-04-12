<?php

use panix\engine\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="product">
    <div class="product-label-container">

        <div><span class="product-label-tag danger"><span>asds</span></span></div>
        <div><span class="product-label-tag success"><span>asds</span></span></div>
    </div>


    <div class="product-image d-flex justify-content-center align-items-center">
        <?php
        echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => 'img-fluid loading']), $model->getUrl(), array());
        //echo Html::link(Html::image(Yii::app()->createUrl('/site/attachment',array('id'=>33)), $data->name, array('class' => 'img-fluid')), $data->getUrl(), array());
        ?>
    </div>
    <div class="product-info">
        <?= Html::a(Html::encode($model->name), $model->getUrl(), array('class' => 'product-title')) ?>
    </div>
    <div class="">

        <?php
        echo $model->beginCartForm();
        ?>


        <div class="product-data">
            <div class="row no-gutters">
                <div class="col-6 col-sm-6 col-lg-6">
                    <?php //$this->widget('ext.rating.StarRating', array('model' => $model, 'readOnly' => true)); ?>
                    <br/>
                    <span class="product-review">
                <a href="<?= \yii\helpers\Url::to($model->getUrl()) ?>#comments_tab">(<?= Yii::t('app', 'REVIEWS', ['n' => $model->commentsCount]); ?>
                    )</a>
            </span>
                </div>
                <div class="col-6 col-sm-6 col-lg-6 text-right">
                    <?php
                    if (Yii::$app->hasModule('compare')) {
                        // $this->widget('mod.compare.widgets.CompareWidget', array('pk' => $model->id, 'skin' => 'icon', 'linkOptions' => array('class' => 'btn btn-compare')));
                    }
                    if (Yii::$app->hasModule('wishlist') && !Yii::$app->user->isGuest) {
                        // $this->widget('mod.wishlist.widgets.WishlistWidget', array('pk' => $model->id, 'skin' => 'icon', 'linkOptions' => array('class' => 'btn btn-wishlist')));
                    }
                    ?>
                </div>
            </div>
            <div class="row no-gutters mt-2">
                <div class="col-6 col-sm-6 col-lg-6 d-flex align-items-center">
                    <div class="product-price">

                        <?php
                        if (Yii::$app->hasModule('discounts')) {
                            if ($model->appliedDiscount) {
                                ?>
                                <span class="price price-discount">
                            <span><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?></span>
                            <sub><?= Yii::$app->currency->active->symbol ?></sub>
                                    <span class="discount-sum">-<?= $model->discountSum; ?></span>
                        </span>
                                <?php
                            }
                        }
                        ?>
                        <div>
                            <span class="price"><span><?= $model->priceRange() ?></span> <sub><?= Yii::$app->currency->active->symbol ?></sub></span>
                        </div>


                    </div>
                </div>
                <div class="col-6 col-sm-6 col-lg-6 text-right">
                    <?php
                    if ($model->isAvailable) {
                        echo Html::a('Купить', 'javascript:cart.add(' . $model->id . ')', array('class' => 'btn btn-warning btn-buy d-block'));
                    } else {
                        echo Html::a(Yii::t('app', 'NOT_AVAILABLE'), 'javascript:cart.notifier(' . $model->id . ');', array('class' => 'btn btn-danger'));
                    }
                    ?>
                </div>
            </div>

        </div>

        <div class="action btn-group2">
            <?php print_r($model->eav_box); ?>

        </div><!-- /.action -->


        <?php echo $model->endCartForm(); ?>
    </div>
</div>

