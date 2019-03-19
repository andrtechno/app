<?php
$message = (empty($error['message'])) ? Yii::t('error', $error['code']) : $error['message'];
?>

<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <h1><?= $error['code'] ?></h1>
            <h2><?= Yii::t('error', $error['code']) ?></h2>
            <div class="error-details">
                <?= $message ?>
            </div>
            <div class="error-actions">
                <?= Html::link(Yii::t('zii', 'Home'), array('/main/default/index'), array('class' => 'btn btn-primary btn-lg')); ?>
            </div>
        </div>
    </div>
</div>