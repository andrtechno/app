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
<div class="container">
    <div class="row">
        <div class="col-12">
            <?= $this->render('@theme/views/layouts/partials/_breadcrumbs'); ?>
        </div>
    </div>
</div>
<!--shop  area start-->
<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <?= $content ?>
        </div>
    </div>
</div>
<!--shop  area end-->


<?= $this->render('@theme/views/layouts/partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
