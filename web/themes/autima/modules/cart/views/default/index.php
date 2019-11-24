<?php

use yii\helpers\Url;
use yii\jui\Spinner;
use panix\engine\Html;
use panix\mod\shop\models\Product;

$this->registerJs("
//cart.selectorTotal = '#total';
var orderTotalPrice = '$totalPrice';

    $(function () {

        $('.payment_checkbox').click(function () {
            $('#payment').text($(this).attr('data-value'));
        });
        $('.delivery_checkbox').click(function () {
            $('#delivery').text($(this).attr('data-value'));

        });
        // if($('#cart-check').length > 0){
        //     $('#cart-check').stickyfloat({ duration: 800 });
        // }
        hasChecked('.payment_checkbox', '#payment');
        hasChecked('.delivery_checkbox', '#delivery');
    });

    function hasChecked(selector, div) {
        $(selector).each(function (k, i) {
            var inp = $(i).attr('checked');
            if (inp == 'checked') {
                $(div).text($(this).attr('data-value'))
            }
        });
    }
    /*function submitform() {
        if (document.cartform.onsubmit &&
            !document.cartform.onsubmit()) {
            return;
        }
        document.cartform.submit();
    }*/


", yii\web\View::POS_END);
?>
<?php
use yii\widgets\ActiveForm;

$formOrder = ActiveForm::begin([
    'enableClientValidation' => false,

    'enableAjaxValidation' => true,
    'action' => ['/cart'],
    'id' => 'cart-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

<?php //echo Html::beginForm(['/cart'], 'post', array('id' => 'cart-form', 'name' => 'cartform')) ?>
<div class="row">
    <?php
    if (empty($items)) { ?>
        <div id="empty-cart-page" class="text-center col">
            <i class="icon-shopcart" style="font-size:130px"></i>
            <h2><?= Yii::t('cart/default', 'CART_EMPTY_HINT') ?></h2>

            <?= Html::a(Yii::t('cart/default', 'CART_EMPTY_BTN'), ['/'], ['class' => 'btn btn-lg btn-outline-secondary']); ?>
        </div>
        <?php return;
    }


    ?>


    <div class="col-12">
        <div class=" table_desc">
            <div class="cart_page table-responsive">
                <table id="cart-table" class="">
                    <thead>
                    <tr>

                        <th colspan="2" class="product_name"
                            style="width:80%"><?= Yii::t('cart/default', 'TABLE_PRODUCT') ?></th>
                        <th class="product_quantity" style="width:5%"><?= Yii::t('cart/default', 'QUANTITY') ?></th>
                        <th class="product_total" style="width:10%">Сумма</th>
                        <th class="product_remove" style="width:5%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($items as $index => $product) { ?>
                        <?php
                        $price = Product::calculatePrices($product['model'], $product['variant_models'], $product['configurable_id']);
                        ?>
                        <tr id="product-<?= $index ?>">
                            <td align="center" style="width:20%">

                                <?= Html::a(Html::img(Url::to($product['model']->getMainImage('x100')->url), ['alt' => $product['model']->name]), $product['model']->getUrl(), ['target' => '_blank']); ?>
                                <?php

                                ?>
                            </td>
                            <td class="text-left">
                                <h5><?= Html::a(Html::encode($product['model']->name), $product['model']->getUrl(), ['target' => '_blank']); ?></h5>
                                <?php
                                //  foreach ($product['model']->loadEavAttributes(['konstrukcia']) as $test){
                                //  print_r($test);
                                //  }
                                //    print_r($product['model']->getFindByEavAttributes2(['konstrukcia']));
                                $s = 'eav_konstrukcia';
                                //echo $product['model']->$s;


                                $query = \panix\mod\shop\models\Attribute::find();
                                $query->where(['IN', 'name', array_keys($product['model']->eavAttributes)]);
                                $query->displayOnList();
                                $query->sort();
                                $result = $query->all();
                                // print_r($query);
                                $s = $product['model']->eavAttributes;
                                foreach ($result as $q) {
                                    echo $q->title .' ';
                                    echo $q->renderValue($s[$q->name]).' <br>';
                                }

                                ?>
                                <?php
                                // Display variant options
                                if (!empty($product['variant_models'])) {
                                    echo Html::beginTag('small', array('class' => 'cartProductOptions'));
                                    foreach ($product['variant_models'] as $variant)
                                        echo ' - ' . $variant->productAttribute->title . ': <strong>' . $variant->option->value . '</strong><br/>';
                                    echo Html::endTag('small');
                                }
                                ?>

                                <div class="price_box">
                                    <span class="current_price">
                                        <span><?= Yii::$app->currency->number_format($price); ?></span>
                                        <?= Yii::$app->currency->active['symbol'] ?>
                                        / <?= $product['model']->units[$product['model']->unit]; ?>
                                    </span>
                                </div>


                                <?php

                                // Display configurable options
                                if (isset($product['configurable_model'])) {
                                    $attributeModels = \panix\mod\shop\models\Attribute::model()->findAllByPk($product['model']->configurable_attributes);
                                    echo Html::beginTag('span', array('class' => 'cartProductOptions'));
                                    foreach ($attributeModels as $attribute) {
                                        $method = 'eav_' . $attribute->name;
                                        echo ' - ' . $attribute->title . ': ' . $product['configurable_model']->$method . '<br/>';
                                    }
                                    echo Html::endTag('span');
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                echo Spinner::widget([
                                    'name' => "quantities[$index]",
                                    'value' => $product['quantity'],
                                    'clientOptions' => ['max' => 999],
                                    'options' => ['product_id' => $index, 'class' => 'cart-spinner']
                                ]);
                                ?>
                                <?= $product['model']->units[$product['model']->unit]; ?>
                                <?php //echo Html::textInput("quantities[$index]", $product['quantity'], array('class' => 'spinner btn-group form-control', 'product_id' => $index)) ?>

                            </td>
                            <td id="price-<?= $index ?>" class="text-center">


                                <div class="price_box">
                                    <span class="current_price">
                                        <span class="cart-sub-total-price"
                                              id="row-total-price<?= $index ?>"><?= Yii::$app->currency->number_format($price * $product['quantity']); ?></span>
                                        <?= Yii::$app->currency->active['symbol'] ?>
                                    </span>
                                </div>

                            </td>
                            <td width="20px" class="remove-item">
                                <?= Html::a(Html::icon('delete'), ['/cart/default/remove', 'id' => $index], ['class' => 'btn btn-sm text-danger remove']) ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <?php if (YII_DEBUG) { ?>
                        <tfoot>
                        <td colspan="5" class="cart_submit">
                            <?= panix\mod\cart\widgets\promocode\PromoCodeWidget::widget([
                                'model' => $this->context->form,
                                'attribute' => 'promocode_id'
                            ]);
                            ?>
                        </td>
                        </tfoot>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?= Html::errorSummary($this->context->form, ['class' => 'alert alert-danger']) ?>
    </div>

</div>
<!--coupon code area start-->
<div class="coupon_area">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="coupon_code left">
                <h3><?= Yii::t('cart/default', 'USER_DATA'); ?></h3>
                <div class="coupon_inner">
                    <?php echo $this->render('_fields_user', [
                        'model' => $this->context->form,
                        'form' => $formOrder,
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="coupon_code left">
                <h3><?= Yii::t('cart/default', 'PAYMENT'); ?> / <?= Yii::t('cart/default', 'DELIVERY'); ?></h3>
                <div class="coupon_inner">
                    <h4 class="text-center2"><?= Yii::t('cart/default', 'DELIVERY'); ?></h4>
                    <?php
                    echo $this->render('_fields_delivery', array(
                            'model' => $this->context->form,
                            'form' => $formOrder,
                            'deliveryMethods' => $deliveryMethods)
                    );
                    ?>
                    <h4 class="text-center2"><?= Yii::t('cart/default', 'PAYMENT'); ?></h4>
                    <?php
                    echo $this->render('_fields_payment', array(
                            'model' => $this->context->form,
                            'form' => $formOrder,
                            'paymenyMethods' => $paymenyMethods)
                    );
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="coupon_code right">
                <h3><?= Yii::t('cart/default', 'ORDER_PRICE'); ?></h3>
                <div class="coupon_inner">
                    <div class="cart_subtotal">
                        <p><?= Yii::t('cart/default', 'PAYMENT'); ?></p>
                        <p class="cart_amount" id="payment">&mdash;</p>
                    </div>
                    <div class="cart_subtotal ">
                        <p><?= Yii::t('cart/default', 'DELIVERY'); ?></p>
                        <p class="cart_amount" id="delivery">&mdash;</p>
                    </div>
                    <div class="cart_subtotal">
                        <p><?= Yii::t('cart/default', 'ORDER_PRICE'); ?></p>
                        <p class="cart_amount">
                        <div class="price_box mt-2">

                            <span class="total-price current_price">
                                <span id="total"><?= Yii::$app->currency->number_format($totalPrice) ?></span>
                                <?php echo Yii::$app->currency->active['symbol']; ?>
                            </span>

                        </div>


                        </p>
                    </div>
                    <div class="checkout_btn">
                        <?= Html::submitButton(Yii::t('cart/default', 'BUTTON_CHECKOUT'), ['class' => '']) ?>
                        <input type="hidden" name="create" value="1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--coupon code area end-->

<?php ActiveForm::end() ?>
<?php //echo Html::endForm() ?>



