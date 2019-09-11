<?php
use panix\engine\Html;
?>

<div class="col-xs-12">
    <div class="category-product-inner wow fadeInUp">
        <div class="products">				
            <div class="product-list product">
                <div class="row">
                    <div class="col-sm-4 col-lg-4">
                        <div class="product-image">
                            <div class="image">
                                <?php
                                echo Html::a(Html::img($model->getMainImageUrl('340x340'), array('alt'=>$model->name,'class' => '2img-responsive')), $model->getUrl(), array('class' => ''));
                                ?>
                            </div>
                        </div><!-- /.product-image -->
                    </div><!-- /.col -->
                    <div class="col-sm-8 col-lg-8">
                        <div class="product-info">
                            <h3 class="name"><?php echo Html::a(Html::encode($model->name), $model->getUrl()) ?></h3>
                            <div>
                                <?php //$this->widget('ext.rating.StarRating', array('model' => $model, 'readOnly' => true)); ?>
                            </div>
                            <div class="product-price clearfix">	
                                <span class="price"><?= $model->priceRange() ?> <?= Yii::$app->currency->active['symbol'] ?></span>

                                <?php
                                if (Yii::$app->hasModule('discounts')) {
                                    if ($model->appliedDiscount) {
                                        ?>
                                        <span class="price-before-discount"><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($model->originalPrice)) ?> <sup><?= Yii::$app->currency->active['symbol'] ?></sup></span>
                                        <?php
                                    }
                                }
                                ?>


                            </div><!-- /.product-price -->

                                 <?= $model->beginCartForm(); ?>
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <?php
                                                if ($model->isAvailable) {
                                                    echo Html::a(Yii::t('app', 'BUY'), 'javascript:cart.add("#form-add-cart-' . $model->id . '")', array('class' => 'btn btn-primary icon'));
                                                } else {
                                                    echo Html::a(Yii::t('app', 'NOT_AVAILABLE'), 'javascript:cart.notifier(' . $model->id . ');', array('class' => 'btn btn-danger'));
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
        
                        </div><!-- /.product-info -->	
                    </div><!-- /.col -->
                </div><!-- /.product-list-row -->







                <div class="product-label">            


                    <?php
                    if ($model->appliedDiscount) {
                        ?>
                        <div class="product-label-tag sale"><span>- <?= $model->discountSum ?></span></div>

                    <?php } ?>
                </div>


            </div><!-- /.product-list -->
        </div>
    </div>
</div>

