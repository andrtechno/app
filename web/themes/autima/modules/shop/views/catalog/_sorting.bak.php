<?php

use yii\helpers\Html;

$this->registerJs("
    $(function () {
        $('.ajax-catalog').click(function (e) {
            filter_ajax($(this).attr('href'));
            return false;
        });
    });
", \yii\web\View::POS_END);
echo Html::beginForm($this->context->currentUrl, 'GET', array('id' => 'sorting-form'));
?>


<div class="row" id="sorter-block">
        <span class="d-md-none">
        <a class="btn-filter" href="#"
           onclick="$('#filters-container').toggleClass('open'); return false;"><?= Yii::t('shop/default', 'Фильтры'); ?></a>
        </span>
    <div class="col-sm-12 col-md-5 col-lg-5 mb-3">
        <?php
        $sorter[Yii::$app->urlManager->removeUrlParam('/' . Yii::$app->requestedRoute, 'sort')] = Yii::t('shop/default', 'SORT');
        $sorter[Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['sort' => 'price'])] = Yii::t('shop/default', 'SORT_BY_PRICE_ASC');
        $sorter[Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['sort' => '-price'])] = Yii::t('shop/default', 'SORT_BY_PRICE_DESC');
        $sorter[Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['sort' => '-date_create'])] = Yii::t('shop/default', 'SORT_BY_DATE_DESC');
        $active = Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['sort' => Yii::$app->request->get('sort')]);

        echo Html::dropDownList('sorter', $active, $sorter, ['onChange' => 'window.location = $(this).val()', 'class' => 'custom-select', 'style' => 'width:auto;']);
        ?>


    </div>
    <div class="col-sm-6 col-md-4 col-lg-4 mb-3">


        <?php
        $limits = array(Yii::$app->urlManager->removeUrlParam('/' . Yii::$app->requestedRoute, 'per-page') => $this->context->allowedPageLimit[0]);
        array_shift($this->context->allowedPageLimit);
        foreach ($this->context->allowedPageLimit as $l) {
            $active = Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['per-page' => Yii::$app->request->get('per-page')]);
            $limits[Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['per-page' => $l])] = $l;
        }
        ?>
        <span><?= Yii::t('shop/default', 'OUTPUT_ON'); ?> </span>
        <?php
        echo Html::dropDownList('per-page', $active, $limits, ['onChange2' => 'window.location = $(this).val()', 'class' => 'custom-select', 'style' => 'width:auto;']);
        ?>
        <span><?= Yii::t('shop/default', 'товаров'); ?></span>

    </div>


    <div class="col-sm-6 col-md-3 col-lg-3 mb-3 text-right">

        <div class="btn-group btn-group-sm">
            <a class="btn btn-outline-secondary ajax-catalog <?php if ($itemView === '_view_grid') echo 'active'; ?>"
               href="<?= Yii::$app->urlManager->removeUrlParam('/' . Yii::$app->requestedRoute, 'view') ?>"><i
                        class="icon-grid"></i></a>
            <a class="btn btn-outline-secondary ajax-catalog <?php if ($itemView === '_view_list') echo 'active'; ?>"
               href="<?= Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['view' => 'list']) ?>"><i
                        class="icon-menu"></i></a>

            <button name="view" value="list">list</button>
            <button name="view" value="">grid</button>
        </div>
    </div>
</div>

<?php
echo Html::endForm();