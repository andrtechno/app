<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;


\app\frontend\web\themes\basic\assets\ThemeAsset::register($this);

/*$c = Yii::$app->settings->get('shop');


$this->registerJs("
        var price_penny = " . $c->price_penny . ";
        var price_thousand = " . $c->price_thousand . ";
        var price_decimal = " . $c->price_decimal . ";
     ", yii\web\View::POS_HEAD, 'numberformat');*/
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

    <?php ?>
    <?php
    /*if (is_null(Yii::$app->seo->block('title'))) {
        echo '<title>' . Html::encode($this->title) . '</title>';
    } else {
        echo '<title>' . Html::encode(Yii::$app->seo->block('title')) . '</title>';
    }*/
    ?>


</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render('partials/_header'); ?>
    Hello, world!
    main
lox poc
    Hello, world!
    <a href="http://google.com">google.com</a>

    <pre>dsasda Hello, world!</pre>
    <div class=" tester content test">dsasda Hello, world!
[container]
    [row]
        [col]col[/col]
        [col sm=3 xl=4]col[/col]
        [col md="6"]ads[/col]
        [col md="6"]ads[/col]
    [/row]
[/container]
    [tabs type="pills"]
    [tab title="Home" active="true"]123213[/tab]
    [tab title="Profile"]123123[/tab]
    [tab title="Messages"]
adads
        [/tab]
    [/tabs]

        [accordion]
        [panel title="Home" active="true"]
        ...
        [/panel]
        [panel title="Profile"]
        ...
        [/panel]
        [panel title="Messages"]
        ...
        [/panel]
        [/accordion]


    </div>
    [alert type="success"] 123 [/alert]


    [badge text="hellow"]

    [badge text="hellow" type="secondary"]


[text="test"]sad[/text]

    [link url="/tester?test=1" target="_self"]MyLink[/link]
    [text color="#c0c0c0"]MyLink[/text]
    [color="#990000"]MyLink[/color]
    <?php

    /* NavBar::begin([
      'brandLabel' => 'CORNER CMS',
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
      'class' => 'navbar-inverse navbar-fixed-top',
      ],
      ]);
      echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => [
      ['label' => Yii::t('app','HOME'), 'url' => ['/site/index']],
      ['label' => 'About', 'url' => ['/site/about']],
      ['label' => 'Contact', 'url' => ['/site/contact']],
      ['label' => 'User', 'url' => ['/user']],
      Yii::$app->user->isGuest ?
      ['label' => 'Login', 'url' => ['/user/login']] :
      ['label' => 'Logout (' . Yii::$app->user->displayName . ')',
      'url' => ['/user/logout'],
      'linkOptions' => ['data-method' => 'post']],
      ],
      ]);


      NavBar::end(); */
    ?>

    <div class="container">
        <?php
        if (isset($this->context->breadcrumbs)) {
            echo Breadcrumbs::widget([
                'links' => $this->context->breadcrumbs,
            ]);
        }
        ?>



        <?= $content ?>


    </div>
</div>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
