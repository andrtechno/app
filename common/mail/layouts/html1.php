<?php
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic');
        body{
        font-size: 16px;
        }
        body, td, input, textarea, select,.fallback-font {
            margin: 0;
            font-family: 'Roboto',Helvetica,Arial,sans-serif;
    </style>
</head>
<body style="width: 600px" class="fallback-font">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
