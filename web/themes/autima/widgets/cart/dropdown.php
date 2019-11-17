<?php
use yii\helpers\Html;
use panix\mod\shop\models\Product;

/** @var $currency \panix\mod\shop\components\CurrencyManager */
/** @var $items [] \panix\mod\shop\models\Product */
?>


<div class="mini_cart_wrapper">

    <?php if ($count > 0) { ?>
        <a href="javascript:void(0)">
            <span class="icon-cart"></span> <?= mb_strtolower(Yii::t('shop/default', 'PRODUCTS_COUNTER', $count)); ?>
        </a>
        <span class="cart_quantity"><?= $count ?></span>


        <div class="mini_cart">
            <?php foreach ($items as $product) { ?>

                <?php
                $price = Product::calculatePrices($product['model'], $product['variant_models'], $product['configurable_id']);
                ?>

                <div class="cart_item">
                    <div class="cart_img">
                        <?php echo Html::a(Html::img($product['model']->getMainImage('50x50')->url, ['class' => 'img-thumbnail']), $product['model']->getUrl()) ?>

                    </div>
                    <div class="cart_info">
                        <?php echo Html::a($product['model']->name, $product['model']->getUrl()) ?>
                        <span class="quantity">Qty: <?php echo $product['quantity'] ?></span>
                        <span class="price_cart"><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($price)) ?> <?= $currency['symbol']; ?></span>
                    </div>
                    <div class="cart_remove">
                        <a href="#"><i class="icon-delete"></i></a>
                    </div>
                </div>


            <?php } ?>

            <div class="mini_cart_footer">
                <div class="cart_button">
                         <span class="total-price pull-left"><span
                                     class="label label-success"><?= $total ?></span> <?= $currency['symbol']; ?></span>
                </div>
                <div class="cart_button">
                    <?= Html::a(Yii::t('cart/default', 'BUTTON_CHECKOUT'), ['/cart'], ['class' => '']) ?>

                </div>

            </div>

        </div>

    <?php } else { ?>
    <a href="javascript:void(0)">
        <span class="icon-cart"></span>  <?= Yii::t('cart/default', 'CART_EMPTY') ?>
    </a>
        <span class="cart_quantity"><?= $count ?></span>
    <?php } ?>
</div>

