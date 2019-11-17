<?php
use yii\helpers\Html;
use yii\widgets\Menu;

/**
 * @var $dataModel \panix\mod\shop\models\Category
 * @var $active \panix\mod\shop\controllers\CatalogController Method getActiveFilters()
 */
?>
<div class="card" id="filter-current">
    <div class="card-header">
        <h5><?= Yii::t('shop/default', 'FILTER_CURRENT') ?></h5>
    </div>
    <div class="card-body">
        <?php
        echo Menu::widget([
            'items' => $active,
            'encodeLabels' => false
        ]);
        ?>
    </div>
    <?php if ($dataModel) { ?>
        <div class="card-footer text-center">
            <?php echo Html::a(Yii::t('shop/default', 'RESET_FILTERS_BTN'), $dataModel->getUrl(), array('class' => 'btn btn-sm btn-primary')); ?>
        </div>
    <?php } ?>
</div>
