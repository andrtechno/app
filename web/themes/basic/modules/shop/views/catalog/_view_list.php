<?php
use panix\engine\Html;

?>
zzzzzzzzzzzzz
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="product-image">
                <div class="image">
                    <?php
                    echo Html::a(Html::img($model->getMainImage('340x265')->url, ['alt' => $model->name, 'class' => '2img-responsive']), $model->getUrl(), ['data-pjax'=>0]);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="product-info">
                <?= Html::a(Html::encode($model->name), $model->getUrl(), ['class' => 'product-title','data-pjax'=>0]) ?>
            </div>

            <span class="product-review">
                <a href="<?= \yii\helpers\Url::to($model->getUrl()) ?>#comments_tab">(<?= Yii::t('app/default', 'REVIEWS', ['n' => $model->commentsCount]); ?>
                    )</a>
            </span>

            <div class="product-label">
                <?php
                if ($model->hasDiscount) {
                    ?>
                    <div class="product-label-tag sale"><span>- <?= $model->discountSum ?></span></div>

                <?php } ?>
            </div>

        </div>
        <div class="col-sm-3">

            <div class="product-price">
                <?php
                if (Yii::$app->hasModule('discounts')) {
                    if ($model->hasDiscount) {
                        ?>
                        <span class="price price-discount">
                                <span><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?></span>
                                <sub><?= Yii::$app->currency->active['symbol'] ?></sub>
                            </span>
                        <span class="discount-sum">-<?= $model->discountSum; ?></span>
                        <?php
                    }
                }
                ?>
                <div>
                    <span class="price"><span><?= $model->priceRange() ?></span> <sub><?= Yii::$app->currency->active['symbol'] ?></sub></span>
                </div>
            </div>


                <?= $model->beginCartForm(); ?>
                <div class="cart clearfix">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <?php
                                if ($model->isAvailable) {
                                    echo Html::a(Yii::t('cart/default', 'BUY'), 'javascript:cart.add(' . $model->id . ')', array('class' => 'btn btn-warning btn-buy'));
                                } else {
                                    \panix\mod\shop\bundles\NotifyAsset::register($this);
                                    echo Html::a(Yii::t('shop/default','NOT_AVAILABLE'), 'javascript:notify(' . $model->id . ');', array('class' => 'text-danger'));
                                }
                                ?>
                            </li>

                            <li class="lnk wishlist">
                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                    <i class="icon fa fa-heart"></i>
                                </a>
                            </li>

                            <li class="lnk">
                                <a class="add-to-cart" href="detail.html" title="Compare">
                                    <i class="fa fa-signal"></i>
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.action -->
                </div><!-- /.cart -->
                <?php echo Html::endForm(); ?>



        </div>
    </div>
</div>
