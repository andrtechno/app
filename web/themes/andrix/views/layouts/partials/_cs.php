<?php
$min = YII_DEBUG ? '' : '.min';

$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery.ui');
$cs->registerCoreScript('history');
$cs->registerCssFile("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic");

$cs->registerScriptFile($this->baseAssetsUrl . "/js/bootstrap{$min}.js");
$cs->registerScriptFile($this->assetsUrl . "/js/bootstrap-toggle{$min}.js");






$cs->registerCssFile($this->assetsUrl . "/css/bootstrap.min.css");


$cs->registerCssFile($this->assetsUrl . "/css/bootstrap-toggle{$min}.css");
$cs->registerCssFile($this->assetsUrl . "/css/jquery-ui.css");
$cs->registerCssFile($this->assetsUrl . "/css/ui.css");
$cs->registerCssFile($this->assetsUrl . "/css/engine.css");


#$cs->registerCssFile($this->assetsUrl . "/css/ie10-viewport-bug-workaround.css");
#$cs->registerCssFile($this->assetsUrl . "/css/style.css");
//$cs->registerCssFile($this->assetsUrl . "/css/defaut.css");
#$cs->registerCssFile($this->assetsUrl . "/css/orange.css");


#$cs->registerScriptFile($this->assetsUrl . "/js/particles.min.js");
#$cs->registerScriptFile($this->assetsUrl . "/js/jquery.easing-1.3.min.js", CClientScript::POS_END);
#$cs->registerScriptFile($this->assetsUrl . "/js/jcf.js", CClientScript::POS_END);
#$cs->registerScriptFile($this->assetsUrl . "/js/jcf.scrollable.js", CClientScript::POS_END);
#$cs->registerScriptFile($this->assetsUrl . "/js/jcf.select.js", CClientScript::POS_END);
#$cs->registerScriptFile($this->assetsUrl . "/js/ie10-viewport-bug-workaround.js", CClientScript::POS_END);

#$cs->registerScriptFile($this->assetsUrl . "/js/owl.carousel.min.js", CClientScript::POS_END);
$cs->registerScriptFile($this->assetsUrl . "/js/owlcarousel_setting.js", CClientScript::POS_END);
$cs->registerScriptFile($this->assetsUrl . "/js/parallax-1.1.3.js", CClientScript::POS_END);
$cs->registerScriptFile($this->assetsUrl . "/js/parallax_setting.js", CClientScript::POS_END);


$cs->registerScriptFile($this->assetsUrl . "/js/masonry.min.js", CClientScript::POS_END);
$cs->registerScriptFile($this->assetsUrl . "/js/masonry.filter.js", CClientScript::POS_END);
$cs->registerScriptFile($this->assetsUrl . "/js/masonry_setting.js", CClientScript::POS_END);






$cs->registerScriptFile($this->assetsUrl . "/js/custom.js", CClientScript::POS_END);
