<?php
use yii\helpers\Html;
use panix\mod\shop\models\Product;

/** @var \panix\mod\shop\components\CurrencyManager $currency */
/** @var \panix\mod\shop\models\Product[] $items */
?>


<div class="mini_cart_wrapper">

    <?php if ($count > 0) { ?>
        <a href="javascript:void(0)">
            <span class="icon-cart"></span> <?= Yii::t('shop/default', 'PRODUCTS_COUNTER', $count); ?>
        </a>
        <span class="cart_quantity"><?= $count ?></span>

        <div class="mini_cart">
            <?php foreach ($items as $product) {
                $price = Product::calculatePrices($product['model'], $product['variant_models'], $product['configurable_id']);
                ?>

                <div class="cart_item">
                    <div class="cart_img text-center">
                        <?php echo Html::a(Html::img($product['model']->getMainImage('50x50')->url, ['class' => 'img-thumbnail']), $product['model']->getUrl()) ?>
                    </div>
                    <div class="cart_info">
                        <?php echo Html::a($product['model']->name, $product['model']->getUrl()) ?>
                        <span class="quantity">Кол.: <?= $product['quantity'] ?></span>
                        <span class="price_cart"><?= Yii::$app->currency->number_format(Yii::$app->currency->convert($price)) ?> <?= $currency['symbol']; ?></span>
                    </div>
                    <div class="cart_remove d-none">
                        <a href="#"><i class="icon-delete"></i></a>
                    </div>
                </div>


            <?php } ?>

            <div class="mini_cart_footer">
                <div class="cart_button">
                    <div class="price_box mt-2">
                        <div>
                            <span class="total-price current_price"><?= $total ?> <?= $currency['symbol']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="cart_button">
                    <?= Html::a(Yii::t('cart/default', 'BUTTON_CHECKOUT'), ['/cart'], ['class' => '']) ?>

                </div>

            </div>

        </div>

    <?php } else { ?>
        <a href="javascript:void(0)">
            <span class="icon-cart"></span> <?= Yii::t('cart/default', 'CART_EMPTY') ?>
        </a>
        <span class="cart_quantity"><?= $count ?></span>
    <?php } ?>
</div>

