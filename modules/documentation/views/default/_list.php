<?php
use panix\engine\Html;

?>

<div style="margin-bottom:20px;list-style: circle">
<?= Html::a($model->name, $model->getUrl(), array('title' => $model->name,'class'=>'h4')) ?>
    <div class="help-block"></div>
</div>



