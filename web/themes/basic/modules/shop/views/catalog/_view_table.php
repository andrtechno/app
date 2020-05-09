<?php
use panix\engine\Html;
?>

<tr data-image="<?= $model->getMainImageUrl('270x347') ?>" class="grid-table-row">
    <td>
        <div class="photo"><?= Html::img($model->getMainImageUrl('270x347'), array('alt'=>$model->name)) ?></div>
        <div class="btn-group-vertical">
            <a href="#" class="btn btn-default btn-xs view_table_image">
                <i class="fa fa-image"></i>
                <img src="<?=$model->getMainImageUrl('270x347')?>" alt="" />
            </a>
            <?php
            if (Yii::$app->hasModule('compare')) {
                echo Html::a('<i class="fa fa-balance-scale"></i>', 'javascript:compare.add(' . $model->id . ');', array(
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => 'В сравнение',
                    'class' => 'btn btn-default btn-xs'
                ));
            }
            if (Yii::$app->hasModule('wishlist')) {
                echo Html::a('<i class="fa fa-heart"></i>', 'javascript:wishlist.add(' . $model->id . ');', array(
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => 'В избранное',
                    'class' => 'btn btn-default btn-xs'
                ));
            }
            ?>


        </div>
    </td>
    <td>
        <?php echo Html::a(Html::encode($model->name), $model->getUrl()) ?>
        <?php if (!empty($model->sku)) { ?>
            <div class="hint small"><?= $model->getAttributeLabel('sku') ?>: <?= $model->sku ?></div>
        <?php } ?>
        <div class="" style="margin-top: 5px;">
            <span class="label label-warning">Хит</span>
            <?php
            if (Yii::$app->hasModule('discounts')) {
                if ($model->hasDiscount) {
                    ?>
                    <span class="label label-success">скидка <?= $model->discountSum ?></span>
                    <?php
                }
            }
            ?> 
        </div>
    </td>
    <td>
    </span>
<?php //$this->widget('ext.rating.StarRating', array('model' => $model)); ?>
</td>
<td>

    <span class="price">
        <span><?php echo $model->priceRange() ?></span>
        <small><?= Yii::$app->currency->active['symbol'] ?></small>
    </span>

    <?php
    if (Yii::$app->hasModule('discounts')) {
        if ($model->hasDiscount) {
            ?>
            <div>
                <span class="price price-xs price-through">
                    <span><?= $model->toCurrentCurrency('originalPrice') ?></span>
                    <small><?= Yii::$app->currency->active['symbol'] ?></small>
                </span>
            </div>
            <?php
        }
    }
    ?>   


</td>
<td class="text-right">
            <?= $model->beginCartForm(); ?>
    <div class="product-action">
        <div class="btn-group btn-group-sm">
            <?php
            if ($model->isAvailable) {
                echo Html::a(Yii::t('app/default', 'BUY'), 'javascript:cart.add("#form-add-cart-' . $model->id . '")', array('class' => 'btn btn-success'));
            } else {
                echo Html::a(Yii::t('app/default', 'NOT_AVAILABLE'), 'javascript:cart.notifier(' . $model->id . ');', array('class' => 'btn btn-link'));
            }
            ?>
        </div>
    </div>
    <?php echo Html::endForm(); ?>
</td>
</tr>


