<?php
use yii\helpers\Html;
use yii\widgets\Menu;

/**
 * @var $dataModel \panix\mod\shop\models\Category
 * @var $active \panix\mod\shop\controllers\CatalogController Method getActiveFilters()
 */
?>

<div class="widget_list widget_categories" id="filter-current">
    <h2>

        <?= Yii::t('shop/default', 'FILTER_CURRENT') ?>

    </h2>

    <?php
    echo Menu::widget([
        'items' => $active,
        'encodeLabels' => false
    ]);
    ?>

    <?php if ($dataModel) { ?>
        <div class="text-center">
            <?php echo Html::a(Yii::t('shop/default', 'RESET_FILTERS_BTN'), $dataModel->getUrl(), ['class' => 'btn btn-sm btn-primary']); ?>
        </div>
    <?php } ?>
</div>
