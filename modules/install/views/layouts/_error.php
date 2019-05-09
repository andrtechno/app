<?php

use yii\helpers\Html;
use yii\bootstrap4\Alert;

$this->title = $name;
?>

<h1><?= $exception->statusCode; ?></h1>

<?php
echo Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'body' => $exception->getMessage(),
    'closeButton' => false
]);
?>
<?php



foreach($exception->getTrace() as $trace){ ?>
<div class="well">
    <div class="">Файл: <?=$trace['file']?></div>
    <div class="">Строка: <?=$trace['line']?></div>
    <div class="">Функция: <?=$trace['function']?></div>
    <div class="">class: <?=$trace['class']?></div>
    <?php foreach($trace['args'] as $args){ ?>
    <?php //print_r($args); ?>
    <?php } ?>
</div>
    

<?php }
