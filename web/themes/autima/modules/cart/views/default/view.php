<?php

use panix\engine\Html;
use yii\helpers\Url;
use panix\mod\shop\models\Product;
use panix\engine\bootstrap\Alert;

/**
 * @var \panix\mod\cart\models\Order $model
 */
$config = Yii::$app->settings->get('shop');
$currency = Yii::$app->currency;
?>


<?php
if (Yii::$app->session->hasFlash('success-promocode')) {

    echo \panix\engine\bootstrap\Alert::widget([
        'options' => ['class' => 'alert alert-success'],
        'closeButton' => false,
        'body' => Yii::$app->session->getFlash('success-promocode')
    ]);

}
?>
<div class="row">



    <?php


    /* $liqpay = new \panix\mod\cart\widgets\payment\liqpay\LiqPay('i61699065543', 'ztgu6RktfUWoSCxEDuoBsOlbm762LQScuQ01c0BI');
     $html = $liqpay->cnb_form(array(
         'action' => 'pay',
         'amount' => '1',
         'currency' => 'USD',
         'description' => 'description text',
         'order_id' => \panix\engine\CMS::gen(5),
         'version' => '3',
         'sandbox' => '1', //1 test mode
         'server_url' => Url::toRoute(['/cart/payment/process', 'payment_id' => 4, 'result' => true], true),
         'result_url' => Url::toRoute(['/cart/payment/process', 'payment_id' => 4], true),
     ));
     echo $html;
*/
    ?>

    <div class="col-12">
        <h1><?= $this->context->pageName; ?></h1>
        <div class="table_desc">
            <div class="cart_page table-responsive">
                <table id="cart-table" class="">
                    <thead>
                    <tr>
                        <th align="center" style="width:40%"
                            colspan="2"><?= Yii::t('cart/default', 'TABLE_PRODUCT') ?></th>
                        <th align="center" style="width:30%"><?= Yii::t('cart/default', 'QUANTITY') ?></th>
                        <th align="center"
                            style="width:30%"><?= Yii::t('cart/default', 'TABLE_SUM', ['currency' => $currency->active['symbol']]) ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->getOrderedProducts()->getModels() as $product) {
                        /** @var \panix\mod\cart\models\OrderProduct $product */

                        //$model->getOrderedProducts()->getData()    ?>
                        <tr>
                            <td align="center" style="width:10%">

                                <?php
                                if ($product->originalProduct) {
                                    echo Html::img(Url::to($product->originalProduct->getMainImage('100x')->url), ['alt' => $product->originalProduct->name]);
                                } else {
                                    echo Html::tag('span', 'удален', ['class' => 'badge badge-danger']);
                                }

                                ?>
                            </td>
                            <td class="text-left">

                                <h5><?= $product->getRenderFullName(false); ?> </h5>



                                <div class="price_box">
                                    <span class="current_price">
                                        <span><?= $currency->number_format($currency->convert($product->price)) ?></span>
                                        <?= Yii::$app->currency->active['symbol'] ?>
                                    </span>
                                </div>
                            </td>
                            <td align="center">
                                <strong><?= $product->quantity ?></strong>
                            </td>
                            <td align="center">

                                <div class="price_box">
                                    <span class="current_price">
                                        <span class="cart-sub-total-price"><?= $currency->number_format($currency->convert($product->price * $product->quantity)); ?></span>
                                        <?= Yii::$app->currency->active['symbol'] ?>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <?php if (!$model->promoCode && false) { ?>
                        <tfoot>
                        <td colspan="2" class="text-right">
                            <label class="control-label h5" for="ordercreateform-promocode_id"
                                   style="margin-bottom: 0">
                                Введите промо-код
                            </label>
                        </td>
                        <td colspan="3">
                            <?php
                            echo Html::beginForm();
                            echo panix\mod\cart\widgets\promocode\PromoCodeWidget::widget([
                                'model' => $model,
                                'attribute' => 'promocode_id'
                            ]);
                            echo Html::error($model, 'promocode_id');
                            echo Html::endForm();

                            /*echo \panix\mod\cart\widgets\promocode\PromoCodeInput::widget([
                                'model' => $model,
                                'attribute' => 'promocode_id',
                                'options' => [
                                    'placeholder' => 'Введите промо-код'
                                ]
                            ]);*/

                            ?>
                        </td>
                        </tfoot>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="coupon_area">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="coupon_code left">
                <h3><?= Yii::t('cart/default', 'USER_DATA'); ?></h3>
                <div class="coupon_inner">
                    <div class="form-group"><?= $model->getAttributeLabel('user_name') ?>:
                        <div class="float-right font-weight-bold"><?= Html::encode($model->user_name); ?></div>
                    </div>

                    <div class="form-group"><?= $model->getAttributeLabel('user_email') ?>:
                        <div class="float-right font-weight-bold"><?= Html::encode($model->user_email); ?></div>
                    </div>

                    <div class="form-group"><?= $model->getAttributeLabel('user_phone') ?>:
                        <div class="float-right font-weight-bold"><?= Html::tel($model->user_phone); ?></div>
                    </div>
                    <?php if (!empty($model->user_comment)) { ?>
                        <div><?= $model->getAttributeLabel('user_comment') ?>:<br/>
                            <?= Html::encode($model->user_comment); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="coupon_code left">
                <h3><?= Yii::t('cart/default', 'PAYMENT'); ?> / <?= Yii::t('cart/default', 'DELIVERY'); ?></h3>
                <div class="coupon_inner">
                    <h4 class="text-center2"><?= Yii::t('cart/default', 'DELIVERY'); ?></h4>
                    <?php if ($model->delivery_price > 0) { ?>
                        <div class="form-group">
                            <?= Yii::t('cart/default', 'COST_DELIVERY') ?>:
                            <div class="float-right font-weight-bold">
                            <span class="price">
                                <?= $currency->number_format($currency->convert($model->delivery_price)) ?>
                                <sub><?= $currency->active['symbol'] ?></sub>
                            </span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group"><?= $model->getAttributeLabel('delivery_id') ?>:
                        <div class="float-right font-weight-bold"><?= Html::encode($model->delivery_name); ?></div>
                    </div>
                    <div class="form-group"><?= $model->getAttributeLabel('user_address') ?>:
                        <div class="float-right font-weight-bold"><?= Html::encode($model->user_address); ?></div>
                    </div>
                    <h4 class="text-center2"><?= Yii::t('cart/default', 'PAYMENT'); ?></h4>
                    <div class="form-group"><?= $model->getAttributeLabel('payment_id') ?>:
                        <div class="float-right font-weight-bold"><?= Html::encode($model->payment_name); ?></div>
                    </div>
                    <?php


                    if ($model->deliveryMethod) {

                        foreach ($model->deliveryMethod->paymentMethods as $payment) {
                            /** @var $payment */
                            ?>
                            <?php
                            $activePay = ($payment->id == $model->payment_id) ? '<span class="icon-checkmark " style="font-size:20px;color:green"></span>' : '';
                            ?>
                            <h5><?= $activePay; ?> <?= $payment->name ?></h5>
                            <p><?= $payment->description ?></p>
                            <p><?= $payment->renderPaymentForm($model) ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="coupon_code right">
                <h3><?= Yii::t('cart/default', 'ORDER_STATUS'); ?> <span class="badge badge-success float-right"><?= $model->statusName ?></span></h3>
                <div class="coupon_inner">


                    <div class="form-group">
                        <?php if ($model->paid) { ?>
                            <?= Yii::t('cart/Order', 'PAID') ?>:
                            <div class="float-right">
                                <span class="badge badge-success"><?= Yii::t('app/default', 'YES') ?></span>
                            </div>
                        <?php } else { ?>
                            <?= Yii::t('cart/Order', 'PAID') ?>:
                            <div class="float-right">
                                <span class="badge badge-danger"><?= Yii::t('app/default', 'NO') ?></span>
                            </div>
                        <?php } ?>

                    </div>
                    <?php if ($model->promoCode) { ?>
                        <div class="form-group"><?= Yii::t('cart/default', 'PROMO_CODE_ACTIVATED') ?>:
                            <div class="float-right font-weight-bold">
                                <span class="badge2 badge-success2 text-success"><strong>-<?= $model->promoCode->discount; ?></strong></span>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group"><?= Yii::t('cart/default', 'TOTAL_PAY') ?>:
                        <div class="float-right font-weight-bold">
                        <span class="price price-lg">
                            <?= $currency->number_format($model->full_price) ?>
                            <sub><?= $currency->active['symbol'] ?></sub>
                        </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

