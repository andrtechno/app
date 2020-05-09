<?php
use yii\widgets\Pjax;

/**
 * @var \panix\mod\pages\models\Pages $model
 */
?>

<h1><?= ($this->h1) ? $this->h1 : $model->isString('name'); ?></h1>

<div class="content mce-content-body">
    <?php Pjax::begin(); ?>
    <?= $model->renderText(); ?>
    <?php Pjax::end(); ?>
</div>
