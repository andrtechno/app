<?php

use yii\helpers\Url;
use yii\helpers\Html;
use panix\mod\shop\widgets\categories\CategoriesWidget;
use panix\mod\shop\widgets\filters\FiltersWidget;

?>


<div class="catalog-container2 d-flex">
    <div class="catalog-sidebar2 d-flex " style="width: 250px;min-width: 250px;flex-direction: column;overflow: hidden">
        <?= CategoriesWidget::widget([]) ?>
        <?php
        echo FiltersWidget::widget([
            'model' => $this->context->dataModel,
            'attributes' => $this->context->eavAttributes,
        ]);

        ?>
    </div>
    <div class="catalog-content2 flex-column" style="width: 100%;overflow-x: hidden;margin-left: 1rem">
        <h1 class="heading-gradient"><?= $this->context->dataModel->name ?></h1>
        <?php echo $this->render('_sorting', ['itemView' => $itemView]); ?>

        <div id="listview-ajax">
            <?php
            echo $this->render('listview', [
                'itemView' => $itemView,
                'provider' => $provider,
            ]);
            ?>
        </div>
    </div>
</div>