<?php

use yii\helpers\Html;

$request = Yii::$app->request;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css>">
        .test{
            background-color: red;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>

<p>------------------------------------------------------</p>
<p><strong class="test">IP address:</strong> <?= $request->userIP; ?></p>
<p><strong>UserAgent:</strong> <?= $request->userAgent; ?></p>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
