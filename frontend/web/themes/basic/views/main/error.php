<?php

use yii\helpers\Html;
use panix\engine\bootstrap\Alert;

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
if(YII_DEBUG){

foreach ($exception->getTrace() as $trace) { ?>
    <?php
    Alert::begin([
        'options' => [
            'class' => 'alert-info',
        ],
        'closeButton' => false
    ]);
    ?>

    <div class="">Файл: <?= $trace['file'] ?></div>
    <div class="">Строка: <?= $trace['line'] ?></div>
    <div class="">Функция: <?= $trace['function'] ?></div>
    <div class="">class: <?= $trace['class'] ?></div>
    <?php foreach ($trace['args'] as $args) { ?>
        <?php //print_r($args); ?>
    <?php } ?>

    <?php Alert::end(); ?>

<?php }
}
