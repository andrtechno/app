<?php
use yii\widgets\Pjax;
?>

<h1><?= $model->name; ?></h1>

<div class="content">
    <?php Pjax::begin(); ?>
    <?= $model->pageBreak('text'); ?>
    <?php Pjax::end(); ?>
</div>
