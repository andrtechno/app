<?php
$min = YII_DEBUG ? '' : '.min';

$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($this->baseAssetsUrl . "/js/bootstrap{$min}.js");
$cs->registerCssFile($this->baseAssetsUrl . "/css/bootstrap{$min}.css");
$cs->registerCssFile($this->baseAssetsUrl . "/css/flaticon.css");
$cs->registerCssFile($this->assetsUrl . "/css/theme.css");
?>
<!DOCTYPE html>
<html lang="<?= Yii::app()->language ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::app()->charset ?>"/>
        <title><?= Html::encode($title) ?></title>
        <style type="text/css">
            body {
                background-color: #eee;
            }
            .panel {
                max-width: 330px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title text-center"><?= Html::encode(mb_strtoupper($title,Yii::app()->charset)) ?></div>
                </div>
                <div class="panel-body">
                    <?= $content; ?>
                </div>
            </div>
        </div>
        <script>
            function panel_height() {
                var height = $(window).height();
                var panel_height = $('.panel').height();
                $('.panel').css({'margin-top': height / 2 - panel_height / 2});
            }
            $(window).ready(function () {
                panel_height();
            });
            $(window).resize(function () {
                panel_height();
            });
        </script>
    </body>
</html>