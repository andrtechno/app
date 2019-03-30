<?php
use panix\engine\Html;
        \app\modules\install\assets\InstallAsset::register($this);
$this->beginPage() ?>
<!doctype html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title><?= Yii::t('install/default', 'TITLE_PAGE'); ?></title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
                <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body class="no-radius">
                <?php $this->beginBody() ?>
        <script>
            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text.toLowerCase() + '_';
            }
        </script>
        <div class="content">
            <div class="text-center auth-logo ">
                <a href="//corner-cms.com" target="_blank">CORNER</a>
                <div class="auth-logo-hint"><?= Yii::t('install/default', 'CMS') ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                  <?php
                  echo $this->context->process;
                //  print_R($event);
                  ?>
                    </h3>
                </div>
                <div class="panel-body2 clearfix"><?php echo $content ?></div>
            </div>
            <div class="text-center">{copyright}</div>
        </div>
        
             <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>


