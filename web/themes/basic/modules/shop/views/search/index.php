<?php

use yii\helpers\Html;
use panix\mod\shop\widgets\filtersnew\FiltersWidget;


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
            <div class="heading-gradient">
                <h1><?= $this->context->pageName; ?></h1>
            </div>

            <div class="col">

                <?php echo $this->render('@shop/views/catalog/_sorting', ['itemView' => $this->context->itemView]); ?>
                <div id="listview-ajax">
                    <?php
                    echo $this->render('@shop/views/catalog/listview', [
                        'itemView' => $this->context->itemView,
                        'provider' => $provider,
                    ]);
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>