<?php
use yii\helpers\Html;
use yii\widgets\Menu;

/**
 * @var $dataModel \panix\mod\shop\models\Category
 * @var $active \panix\mod\shop\controllers\CatalogController Method getActiveFilters()
 * @var $url array Route refresh filters
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


        <div class="text-center">
            <?php echo Html::a(Yii::t('shop/default', 'RESET_FILTERS_BTN'), $url, ['class' => 'btn btn-sm btn-primary']); ?>
        </div>

</div>
