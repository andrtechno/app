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
echo Html::beginForm($this->context->currentUrl, 'GET', ['id' => 'sorting-form']);
?>
    <span class="d-md-none">
        <a class="btn-filter" href="#"
           onclick="$('#filters-container').toggleClass('open'); return false;"><?= Yii::t('shop/default', 'Фильтры'); ?></a>
        </span>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 text-center text-md-left">
                <?php
                echo Html::submitButton('<i class="icon-grid"></i>', ['class' => 'btn btn-link', 'name' => 'view', 'value' => NULL]);
                echo Html::submitButton('<i class="icon-menu"></i>', ['class' => 'btn btn-link', 'name' => 'view', 'value' => 'list']);
                ?>
            </div>
            <div class="col-sm-4 text-center">
                <?php
                $sorter[NULL] = Yii::t('shop/default', 'SORT');
                $sorter['price'] = Yii::t('shop/default', 'SORT_BY_PRICE_ASC');
                $sorter['-price'] = Yii::t('shop/default', 'SORT_BY_PRICE_DESC');
                $sorter['-date_create'] = Yii::t('shop/default', 'SORT_BY_DATE_DESC');
                //  $active = Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, ['sort' => Yii::$app->request->get('sort')]);

                echo Html::dropDownList('sorter', Yii::$app->request->get('sort'), $sorter, ['class' => 'custom-select', 'style' => 'width:auto;']);
                ?>

            </div>
            <div class="col-sm-5 text-center text-md-right">
                <?php
                $limits[NULL] = $this->context->allowedPageLimit[0];
                array_shift($this->context->allowedPageLimit);
                foreach ($this->context->allowedPageLimit as $l) {
                    $limits[$l] = $l;
                }
                ?>
                <span><?= Yii::t('shop/default', 'OUTPUT_ON'); ?> </span>
                <?= Html::dropDownList('per-page', Yii::$app->request->get('per-page'), $limits, ['class' => 'custom-select', 'style' => 'width:auto;'/*,'prompt'=>$this->context->allowedPageLimit[0]*/]); ?>
                <span><?= Yii::t('shop/default', 'товаров'); ?></span>
            </div>
        </div>
    </div>


<?= Html::endForm();