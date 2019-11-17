<?php

use yii\helpers\Html;
use yii\helpers\Inflector;

//var_dump($attributes);

foreach ($attributes as $attrData) {
    if (count($attrData['filters']) > 1) {
        ?>
        <div class="widget_list widget_categories" id="filter-attributes-<?= Inflector::slug($attrData['title']); ?>">

            <h2>
                <a class="" data-toggle="collapse" href="#collapse-<?= md5($attrData['title']) ?>"
                   aria-expanded="true" aria-controls="collapse-<?= md5($attrData['title']) ?>">
                    <?= Html::encode($attrData['title']) ?>
                </a>
            </h2>


            <div class="card-collapse collapse in" id="collapse-<?= md5($attrData['title']) ?>">

                <ul class="filter-list">
                    <?php
                    foreach ($attrData['filters'] as $filter) {


                        // if ($filter['count'] > 0) {
                        $url = Yii::$app->urlManager->addUrlParam('/' . Yii::$app->requestedRoute, [$filter['queryKey'] => $filter['queryParam']], $attrData['selectMany']);
                        //} else {
                        //     $url = 'javascript:void(0)';
                        // }

                        $queryData = explode(',', Yii::$app->request->getQueryParam($filter['queryKey']));

                        echo Html::beginTag('li');
                        // Filter link was selected.

                        if (in_array($filter['queryParam'], $queryData)) {
                            $checked = true;
                            // Create link to clear current filter
                            $url = Yii::$app->urlManager->removeUrlParam('/' . Yii::$app->requestedRoute, $filter['queryKey'], $filter['queryParam']);
                            //echo Html::a($filter['title'], $url, array('class' => 'active'));
                        } else {
                            $checked = false;
                            //echo Html::a($filter['title'], $url);
                        }
                        //var_dump($checked);
                        echo Html::checkBox('filter[' . $filter['queryKey'] . '][]', $checked, ['value' => $filter['queryParam'], 'id' => 'filter_' . $filter['queryKey'] . '_' . $filter['queryParam']]);
                        echo Html::label($filter['title'], 'filter_' . $filter['queryKey'] . '_' . $filter['queryParam']);
                        echo $this->context->getCount($filter);

                        echo Html::endTag('li');
                    }
                    ?>
                </ul>
            </div>
        </div>

        <?php
    }
}
?>
