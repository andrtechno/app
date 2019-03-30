<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;


        \app\modules\install\assets\InstallAsset::register($this);
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

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
