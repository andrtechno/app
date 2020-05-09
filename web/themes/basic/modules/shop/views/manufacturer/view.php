<?php

use yii\helpers\Html;

/**
 * @var $provider \panix\engine\data\ActiveDataProvider
 */
?>



<div class="catalog-container">
    <div class="catalog-sidebar">
        <div id="filters-container">
            <a class="d-md-none btn-filter-close close" href="javascript:void(0)"
               onclick="$('#filters-container').toggleClass('open'); return false;">
                <span>&times;</span>
            </a>

            <?php
            echo \panix\mod\shop\widgets\filtersnew\FiltersWidget::widget([
                'model' => $this->context->dataModel,
                'attributes' => $this->context->eavAttributes,

            ]);

            ?>
        </div>
    </div>
    <div class="catalog-content">
        <div class="heading-gradient">
            <h1><?= Html::encode(($this->h1) ? $this->h1 : Yii::t('shop/default', 'MANUFACTURER') . ' ' . $this->context->pageName); ?></h1>
        </div>
        <?php if (!empty($model->description)) { ?>
            <div>
                <?php echo $model->description ?>
            </div>
        <?php } ?>
        <?php echo $this->render('@shop/views/catalog/_sorting', ['itemView' => $this->context->itemView]); ?>

        <div id="listview-ajax">
            <?php
            echo $this->render('@shop/views/catalog/listview',[
                'provider' => $provider,
                'itemView'=>$this->context->itemView
            ]);
            ?>

        </div>
    </div>
    <div class="clearfix"></div>
</div>

