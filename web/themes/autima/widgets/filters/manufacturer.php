<?php

use yii\helpers\Html;

?>

<?php if ($manufacturers['filters'] && count($manufacturers['filters']) > 1) { ?>
    <div class="widget_list widget_categories">
        <h2>
            <a class="" data-toggle="collapse" href="#collapse-<?= md5('manufacturer') ?>"
               aria-expanded="true" aria-controls="collapse-<?= md5('manufacturer') ?>">
                <?= Yii::t('shop/default', 'FILTER_BY_MANUFACTURER') ?>
            </a>
        </h2>
        <div class="card-collapse collapse in" id="collapse-<?= md5('manufacturer') ?>">
            <ul class="filter-list">
                <?php

                foreach ($manufacturers['filters'] as $filter) {
                    $url = Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, array($filter['queryKey'] => $filter['queryParam']), $manufacturers['selectMany']);
                    $queryData = explode(',', Yii::$app->request->getQueryParam($filter['queryKey']));

                    echo Html::beginTag('li');


                    // Filter link was selected.
                    if (in_array($filter['queryParam'], $queryData)) {
                        // Create link to clear current filter
                        $checked = true;
                        $url = Yii::$app->urlManager->removeUrlParam('/' . Yii::$app->requestedRoute, $filter['queryKey'], $filter['queryParam']);
                        //echo Html::a($filter['title'], $url, array('class' => 'active'));
                    } else {
                        $checked = false;
                        //echo Html::a($filter['title'], $url);
                    }
                    echo Html::checkBox('filter[' . $filter['queryKey'] . '][]', $checked, array('value' => $filter['queryParam'], 'id' => 'filter_' . $filter['queryKey'] . '_' . $filter['queryParam']));
                    echo Html::label($filter['title'], 'filter_' . $filter['queryKey'] . '_' . $filter['queryParam']);


                    echo $this->context->getCount($filter);
                    echo Html::endTag('li');
                }
                ?>

                <li>
                    <input type="checkbox">
                    <a href="#">Categories5(8)</a>
                    <span class="checkmark"></span>
                </li>

            </ul>
        </div>
    </div>


<?php } ?>