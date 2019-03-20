<?php

use panix\engine\bootstrap\Alert;
use yii\helpers\Html;


?>

<div class="row">
    <div class="col-12">
        <div class="text-center">
            <h1><?= $exception->statusCode; ?></h1>
            <h2><?= $exception->getMessage(); ?></h2>
            <p>
                <?= Html::a('На главную', ['/'], ['class' => 'btn btn-primary']); ?>
            </p>
        </div>
    </div>
    <div class="col-12">
        <?php
        /*Alert::begin([
            'options' => [
                'class' => 'alert-dange2r',
            ],
            'closeButton' => false
        ]);*/
        ?>
        <?php foreach ($exception->getTrace() as $trace) { ?>
            <div class=""><strong><?= $trace['file'] ?></strong>(<?= $trace['line'] ?>)</div>
            <div class=""><?= $trace['class'] ?>::<?= $trace['function'] ?></div>
            <hr/>
        <?php } ?>
        <?php //Alert::end(); ?>

    </div>
</div>
