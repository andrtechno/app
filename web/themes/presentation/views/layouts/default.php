<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;


\app\web\themes\presentation\assets\ThemeAsset::register($this);

$c = Yii::$app->settings->get('shop');


$this->registerJs("
        var price_penny = " . $c->price_penny . ";
        var price_thousand = " . $c->price_thousand . ";
        var price_decimal = " . $c->price_decimal . ";
     ", yii\web\View::POS_HEAD, 'numberformat');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render('partials/_header'); ?>


    <main role="main" class="container">
        <?php if (isset($this->context->breadcrumbs)) { ?>
            <?php
            echo Breadcrumbs::widget([
                'links' => $this->context->breadcrumbs,
            ]);
            ?>
        <?php } ?>
        <?php if (Yii::$app->session->allFlashes) { ?>
            <?php foreach (Yii::$app->session->allFlashes as $key => $message) { ?>
                <div class="alert alert-<?= $key ?> fadeOut-time">
                    <i class="fa fa-check-circle fa-2x"></i> <?= $message ?></div>
            <?php } ?>
        <?php } ?>
        <?= $content ?>

    </main>

</div>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
