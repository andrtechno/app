<?php
use panix\engine\Html;

\app\modules\install\assets\InstallAsset::register($this);
$this->registerJs('
    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text.toLowerCase() + "_";
    }
');
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
    <div class="text-center auth-logo">
        <a href="//pixelion.com.ua" target="_blank">PIXELION</a>
        <div class="auth-logo-hint"><?= Yii::t('app', 'CMS') ?></div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong><?= $this->context->process; ?></strong>
        </div>
        <div class="panel-body clearfix p-0"><?php echo $content ?></div>
    </div>
    <div class="text-center">{copyright}</div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


