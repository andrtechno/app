<?php

use yii\helpers\Html;

?>

<div class="row">
    <div class="col-12">
        <div class="text-center">
            <h1><?= $exception->statusCode; ?></h1>
            <h2><?= $exception->getMessage(); ?></h2>
            <p>
                <?= Html::a(Yii::t('app', 'GO_HOME'), ['/'], ['class' => 'btn btn-primary']); ?>
            </p>
        </div>
    </div>
    <div class="col-12">
        <?php foreach ($exception->getTrace() as $trace) { ?>
            <div class=""><strong><?= $trace['file'] ?></strong>(<?= $trace['line'] ?>)</div>
            <div class=""><?= $trace['class'] ?>::<?= $trace['function'] ?></div>
            <hr/>
        <?php } ?>
    </div>
</div>
