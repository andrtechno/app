<?php

use panix\engine\bootstrap\Alert;

/**
 * @var $exception \yii\web\HttpException
 * @var $handler \yii\web\ErrorHandler
 */

?>
<div class="heading-gradient text-center">
    <h1><?= $exception->statusCode; ?></h1>
</div>
<?php
echo Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'body' => $exception->getMessage(),
    'closeButton' => false
]);

?>
<?php if (YII_DEBUG) { ?>
    <h2 class="text-center">Trace</h2>
    <?php foreach ($exception->getTrace() as $index => $trace) { ?>
        <div style="word-break: break-all;">
            <div><strong><?= $trace['file']; ?></strong> (<?= $trace['line'] ?>)</div>
            <div class="help-block text-muted"><?= $trace['class'] ?><?= $trace['type'] ?><?= $trace['function'] ?></div>
            <hr/>
        </div>
    <?php } ?>
<?php } ?>