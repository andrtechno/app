<?php
use yii\widgets\Pjax;
?>

<h1><?= $model->name; ?></h1>

<div class="content mce-content-body">
    <?php Pjax::begin(); ?>
    <?= $model->renderText(); ?>
    <?php Pjax::end(); ?>
</div>
