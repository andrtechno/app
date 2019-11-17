<?php

use yii\helpers\Html;
use yii\bootstrap\Alert;


?>

<h1>Ошибка</h1>

<?php
echo Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'body' => $message,
    'closeButton' => false
]);
?>
<?php


