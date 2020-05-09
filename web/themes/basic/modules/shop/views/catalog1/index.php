<?php
use yii\helpers\Url;
use panix\mod\shop\widgets\categories\CategoriesWidget;
Url::remember(); // сохраняем URL для последующего использования

?>

<div class="container">
    <?= CategoriesWidget::widget([]) ?>
</div>

