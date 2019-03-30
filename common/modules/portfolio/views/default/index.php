<?php
use yii\helpers\Url;

Url::remember(); // сохраняем URL для последующего использования

?>


<?php

use panix\mod\shop\widgets\categories\CategoriesWidget;
?>
<?= CategoriesWidget::widget([]) ?>
        