<?php

use yii\helpers\Html;

?>

<?php if ($manufacturers['filters'] && count($manufacturers['filters']) > 1) { ?>
    <div class="widget_list widget_categories">
        <h2>
            <a class="" data-toggle="collapse" href="#collapse-manufacturer"
               aria-expanded="true" aria-controls="collapse-manufacturer">
                <?= Yii::t('shop/default', 'FILTER_BY_MANUFACTURER') ?>
            </a>
        </h2>
        <div class="card-collapse collapse in" id="collapse-manufacturer">
            <?php if (count($manufacturers['filters']) >= 20) { ?>
                <input type="text" name="search-filter"
                       onkeyup="filterSearchInput(this,'filter-manufacturer')" class="form-control" placeholder="<?=Yii::t('shop/default','SEARCH');?>">
            <?php } ?>
            <ul class="filter-list" id="filter-manufacturer">
                <?php

                foreach ($manufacturers['filters'] as $filter) {
                    $url = Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, [$filter['key'] => $filter['queryParam']], $manufacturers['selectMany']);
                    $queryData = explode(',', Yii::$app->request->getQueryParam($filter['key']));

                    echo Html::beginTag('li');


                    // Filter link was selected.
                    if (in_array($filter['queryParam'], $queryData)) {
                        // Create link to clear current filter
                        $checked = true;
                        $url = Yii::$app->urlManager->removeUrlParam('/' . Yii::$app->requestedRoute, $filter['key'], $filter['queryParam']);
                        //echo Html::a($filter['title'], $url, array('class' => 'active'));
                    } else {
                        $checked = false;
                        //echo Html::a($filter['title'], $url);
                    }
                    echo '<div class="custom-control custom-checkbox">';
                    echo Html::checkBox('filter[' . $filter['key'] . '][]', $checked, ['class' => 'custom-control-input', 'value' => $filter['queryParam'], 'id' => 'filter_' . $filter['key'] . '_' . $filter['queryParam']]);
                    echo Html::label($filter['title'], 'filter_' . $filter['key'] . '_' . $filter['queryParam'],['class' => 'custom-control-label']);


                    echo $this->context->getCount($filter);
                    echo '</div>';
                    echo Html::endTag('li');
                }
                ?>
            </ul>
        </div>
    </div>
<?php } ?>