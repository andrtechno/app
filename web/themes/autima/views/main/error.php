<?php
/**
 * @var $exception \yii\web\HttpException
 * @var $handler \yii\web\ErrorHandler
 */

?>
<div class="col-12">
    <div class="error_form">


        <h1><?= $exception->statusCode; ?></h1>
        <h2><?= $exception->getMessage(); ?></h2>
    </div>
</div>
<div class="col-12">
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
</div>

