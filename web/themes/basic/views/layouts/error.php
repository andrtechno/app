<?php

use panix\engine\Html;
use panix\engine\widgets\Breadcrumbs;

\app\web\themes\basic\ThemeAsset::register($this);
\panix\engine\assets\ErrorAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
	<script charset="UTF-8" src="//cdn.sendpulse.com/js/push/3e9c33d0f25795d8e0a72d77af9e38c6_0.js" async></script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap page-error">
    <?= $this->render('partials/_header'); ?>
    <div class="container">
        <?php if (isset($this->context->breadcrumbs)) { ?>
            <?php
            echo Breadcrumbs::widget([
                'links' => $this->context->breadcrumbs,
            ]);
            ?>
        <?php } ?>


        <?php
        echo $content;
        ?>
    </div>
</div>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
