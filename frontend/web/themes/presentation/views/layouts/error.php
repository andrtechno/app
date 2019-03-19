<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Alert;

\app\web\themes\presentation\assets\ThemeAsset::register($this);
\panix\engine\assets\ErrorAsset::register($this);
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
                <h1><?= $exception->statusCode; ?></h1>
                <?php
                echo Alert::widget([
                    'options' => ['class' => 'alert-danger'],
                    'body' => $exception->getMessage(),
                    'closeButton' => false
                ]);
                ?>
<?php
print_r($_GET);
?>
            </div>
        </div>
        <?= $this->render('partials/_footer'); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
