<?php

use panix\engine\Html;
use panix\engine\widgets\Breadcrumbs;


\app\web\themes\autima\ThemeAsset::register($this);

/*$c = Yii::$app->settings->get('shop');


$this->registerJs("
        var price_penny = " . $c->price_penny . ";
        var price_thousand = " . $c->price_thousand . ";
        var price_decimal = " . $c->price_decimal . ";
     ", yii\web\View::POS_HEAD, 'numberformat');*/
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render('partials/_header'); ?>
    <div class="container">
        <?= $this->render('@theme/views/layouts/partials/_breadcrumbs'); ?>

        <?php
        if (Yii::$app->session->allFlashes) {
            foreach (Yii::$app->session->allFlashes as $key => $message) {
                if(is_string($message)){
                echo \panix\engine\bootstrap\Alert::widget([
                    'options' => ['class' => 'alert alert-' . $key],
                    'closeButton' => false,
                    'body' => $message
                ]);
                }
            }
        }
        ?>
        <?= $content ?>


    </div>
</div>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
