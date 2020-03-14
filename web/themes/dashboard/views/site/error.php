<?php
use yii\helpers\Html;
/**
 * @var $exception \yii\web\HttpException
 * @var $handler \yii\web\ErrorHandler
 */
?>

<div class="row">
    <div class="col-12">
        <div class="text-center">
            <h1><?= $statusCode; ?></h1>
            <h2><?= $exception->getMessage(); ?></h2>
            <p>
                <?= Html::a(Yii::t('app/default', 'GO_HOME'), ['/'], ['class' => 'btn btn-primary']); ?>
            </p>
        </div>
    </div>
    <div class="col-12">
        <?php foreach ($exception->getTrace() as $trace) { ?>
            <div style="word-break: break-all;">
                <div><strong><?= $trace['file'] ?></strong>(<?= $trace['line'] ?>)</div>
                <div class="help-block text-muted"><?= $trace['class'] ?><?= $trace['type'] ?><?= $trace['function'] ?></div>
                <hr/>
            </div>
        <?php } ?>
    </div>
</div>