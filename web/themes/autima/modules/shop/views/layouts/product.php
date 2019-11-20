<?php

use panix\engine\Html;
use panix\engine\widgets\Breadcrumbs;


\app\web\themes\autima\ThemeAsset::register($this);
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
<?= $this->render('@theme/views/layouts/partials/_header'); ?>
<div class="container">
    <?= $this->render('@theme/views/layouts/partials/_breadcrumbs'); ?>

    <?php
    if (Yii::$app->session->allFlashes) {
        foreach (Yii::$app->session->allFlashes as $key => $message) {
            echo \panix\engine\bootstrap\Alert::widget([
                'options' => ['class' => 'alert alert-' . $key],
                'closeButton' => false,
                'body' => $message
            ]);
        }
    }
    ?>
</div>
<?= $content ?>

<?= $this->render('@theme/views/layouts/partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
