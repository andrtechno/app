<?php

use yii\helpers\Html;
use panix\mod\shop\widgets\filters\FiltersWidget;

if (($q = Yii::$app->request->get('q')))
    $result = Html::encode($q);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">

            <?php
            echo FiltersWidget::widget([
                'model' => $this->context->dataModel,
                'attributes' => $this->context->eavAttributes,
            ]);

            ?>
        </div>
        <div class="col-md-8">
            <h1><?=
                Yii::t('shop/default', 'SEARCH_RESULT', [
                    'query' => $result,
                    'count' => $provider->totalCount,
                   // 'count' => $provider->totalCount
                ]);
                ?></h1>

            <div class="col">

                <?php echo $this->render('_sorting', ['itemView' => $itemView]); ?>
                <div id="listview-ajax">
                    <?php
                    echo $this->render('listview',[
                        'itemView' => $itemView,
                        'provider' => $provider,
                    ]);
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>