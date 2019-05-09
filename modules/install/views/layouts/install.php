<?php
use panix\engine\Html;

\app\modules\install\assets\InstallAsset::register($this);

$this->beginPage() ?>
<!doctype html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title><?= Yii::t('install/default', 'TITLE_PAGE'); ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="no-radius">
<?php $this->beginBody() ?>
<div class="content">

    <?php if (Yii::$app->session->hasFlash('notice')) { ?>

        <div class="alert alert-warning"><?= print_r(Yii::$app->session->getFlash('notice')) ?></div>

    <?php } ?>
    <?php

    //  if($_SESSION){
    \yii\helpers\VarDumper::dump($_SESSION,10,true);
   /* unset($_SESSION['Wizard.stepData']);
    unset($_SESSION['Wizard.index']);
    unset($_SESSION['Wizard.steps']);
    unset($_SESSION['Wizard.branches']);*/
    //  }

    ?>
    <div class="text-center auth-logo">
        <a href="//pixelion.com.ua" target="_blank">PIXELION</a>
        <div class="auth-logo-hint"><?= Yii::t('app', 'CMS') ?></div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong><?php //echo $this->context->stepLabel('db'); ?><?php //echo $this->context->getStepCount(); ?></strong>
        </div>
        <div class="card-body p-0">

            <?php echo $content ?>


        </div>
    </div>
    <div class="text-center">{copyright}</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


