<?php

use panix\engine\Html;
use yii\widgets\ActiveForm;
?>
<?php
$this->registerJs("
cart.spinnerRecount = false;
cart.skin = 'dropdown';

$(document).ready(function() {
    $('.carousel').carousel({
        interval: 6000
    });
});

", yii\web\View::POS_BEGIN, 'cart');
?>


<div class="row">
    <div class="col-sm-6 col-xs-12">
        <?= Html::img($model->getMainImageUrl('500x500')); ?>


        <?php foreach ($model->getImages(['isMain' => null]) as $image) { ?>
            <?= Html::img($image->getUrl('100x100')); ?>
        <?php }
        ?>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="btn-group">
            <?php
            if ($prev = $model->getNextOrPrev('prev')) {
                echo Html::a('prev ' . $prev->name, $prev->getUrl(), ['class' => 'btn btn-default']);
            }
            if ($next = $model->getNextOrPrev('next')) {
                echo Html::a($next->name . ' next', $next->getUrl(), ['class' => 'btn btn-default']);
            }
            ?>
        </div>
        <h1><?= $model->name ?></h1>



        <?php if ($model->appliedDiscount) { ?>

            <span class="price price-discount">
                <span><?= $model::formatPrice(Yii::$app->currency->convert($model->discountPrice)) ?></span>
                <sup><?= Yii::$app->currency->active->symbol ?></sup>
            </span>
        <?php } ?>
        <span class="price <?php echo($model->appliedDiscount) ? 'strike' : ''; ?>">
            <span><?= $model::formatPrice($model->getDisplayPrice()); ?></span>
            <sup><?= Yii::$app->currency->active->symbol; ?></sup>
        </span>
        <?= $model->beginCartForm(); ?>
        <?php
        echo Html::a(Html::icon('shopcart') . Yii::t('cart/default', 'BUY'), 'javascript:cart.add("#form-add-cart-' . $model->id . '")', array('class' => 'btn btn-primary'));
        ?>
        <?php
        echo yii\jui\Spinner::widget([
            'name' => "quantity",
            'value' => 1,
            'clientOptions' => [
                'numberFormat' => "n",
                //'icons'=>['down'=> "icon-arrow-up", 'up'=> "custom-up-icon"],
                'max' => 999
            ],
            'options' => ['class' => 'cart-spinner'],
        ]);

        echo panix\mod\cart\widgets\buyOneClick\BuyOneClickWidget::widget();
        ?>
        <?php
        if (Yii::$app->user->isGuest) {
            echo Html::a(Yii::t('wishlist/default', 'BTN_WISHLIST'), ['/users/register'], []);
        } else {
            echo Html::a(Yii::t('wishlist/default', 'BTN_WISHLIST'), 'javascript:wishlist.add(' . $model->id . ');', []);
        }
        ?>
        <?php echo Html::endForm(); ?>


        <ul class="list-group">
            <?php if ($model->manufacturer_id) { ?>
                <li class="list-group-item">
                <?= $model->getAttributeLabel('manufacturer_id'); ?>: <?= Html::a($model->manufacturer->name, $model->manufacturer->getUrl()); ?>
                </li>

            <?php } ?>
            <li class="list-group-item">
                Категории<?php
                foreach ($model->categories as $c) {
                    $content[] = Html::a($c->name, $c->getUrl());
                }
                echo implode(', ', $content);
                ?>
            </li>

        </ul>

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php
        $tabs = [];
        if (!empty($model->full_description)) {
            $tabs[] = [
                'label' => $model->getAttributeLabel('full_description'),
                'content' => $model->full_description,
                //   'active' => true,
                'options' => ['id' => 'description'],
            ];
        }
        if ($model->eavAttributes) {
            $tabs[] = [
                'label' => 'Характеристики',
                'content' => $this->render('tabs/_attributes', ['model' => $model]),
                'options' => ['id' => 'attributes'],
            ];
        }
        if ($model->relatedProducts) {
            $tabs[] = [
                'label' => 'Связи',
                'content' => $this->render('tabs/_related', ['model' => $model]),
                'options' => ['id' => 'related'],
            ];
        }
        if ($model->video) {
            $tabs[] = [
                'label' => 'Видео',
                'content' => $this->render('tabs/_video', ['model' => $model]),
                'options' => ['id' => 'videl'],
            ];
        }



        echo yii\bootstrap\Tabs::widget(['items' => $tabs]);
        ?>
    </div>
</div>
