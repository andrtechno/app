<?php

use panix\engine\Html;
use yii\widgets\Breadcrumbs;


\app\web\themes\basicnew\ThemeAsset::register($this);

/*$c = Yii::$app->settings->get('shop');


$this->registerJs("
        var price_penny = " . $c->price_penny . ";
        var price_thousand = " . $c->price_thousand . ";
        var price_decimal = " . $c->price_decimal . ";
     ", yii\web\View::POS_HEAD, 'numberformat');*/

//add
//Yii::$app->authManager->assign(Yii::$app->authManager->createRole('Manager'),2);

//remove
//Yii::$app->authManager->revoke(Yii::$app->authManager->createRole('Manager'),2);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <script charset="UTF-8" src="//cdn.sendpulse.com/js/push/3e9c33d0f25795d8e0a72d77af9e38c6_0.js" async></script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?= $this->render('partials/_header'); ?>
    Hello, world!
    main
    lox poc
    <a href="http://google.com">google.com</a>

    <pre>dsasda Hello, world!</pre>
    <div class=" tester content test">
        Hello, world!
        main
        lox poc

        dsasda Hello, world!
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
      ['label' => Yii::t('app/default','HOME'), 'url' => ['/site/index']],
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

        <?php echo \panix\mod\shop\widgets\brands\BrandsWidget::widget([]); ?>
    </div>
</div>
<?= $this->render('partials/_subscribe'); ?>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
