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

    <script charset="UTF-8" src="//cdn.sendpulse.com/js/push/3e9c33d0f25795d8e0a72d77af9e38c6_0.js" async></script>
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

        <?php


        // Without Composer (and instead of "require 'vendor/autoload.php'"):
        // require("your-path/sendpulse-rest-api-php/src/ApiInterface.php");
        // require("your-path/sendpulse-rest-api-php/src/ApiClient.php");
        // require("your-path/sendpulse-rest-api-php/src/Storage/TokenStorageInterface.php");
        // require("your-path/sendpulse-rest-api-php/src/Storage/FileStorage.php");
        // require("your-path/sendpulse-rest-api-php/src/Storage/SessionStorage.php");
        // require("your-path/sendpulse-rest-api-php/src/Storage/MemcachedStorage.php");
        // require("your-path/sendpulse-rest-api-php/src/Storage/MemcacheStorage.php");

        use Sendpulse\RestApi\ApiClient;
        use Sendpulse\RestApi\Storage\FileStorage;

        // API credentials from https://login.sendpulse.com/settings/#api
        define('API_USER_ID', 'c5245ef89aa041860bb1ec978e75d2a3');
        define('API_SECRET', '211ca441e5ceabef488475a9b895b9e6');
        define('PATH_TO_ATTACH_FILE', __FILE__);

        $SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());
print_r($SPApiClient->pushListCampaigns());
        /*
         * Example: Get Mailing Lists
         */
       // var_dump($SPApiClient->listAddressBooks());

        /*
         * Example: Add new email to mailing lists
         */
        $bookID = 123;
        $emails = array(
            array(
                'email' => 'subscriber@example.com',
                'variables' => array(
                    'phone' => '+12345678900',
                    'name' => 'User Name',
                )
            )
        );
        $additionalParams = array(
            'confirmation' => 'force',
            'sender_email' => 'sender@example.com',
        );
        // With confirmation
        // var_dump($SPApiClient->addEmails($bookID, $emails, $additionalParams));

        // Without confirmation
        // var_dump($SPApiClient->addEmails($bookID, $emails));

        /*
         * Example: Send mail using SMTP
         */
        $email = array(
            'html' => '<p>Hello!</p>',
            'text' => 'Hello!',
            'subject' => 'Mail subject',
            'from' => array(
                'name' => 'John',
                'email' => 'sender@example.com',
            ),
            'to' => array(
                array(
                    'name' => 'Subscriber Name',
                    'email' => 'subscriber@example.com',
                ),
            ),
            'bcc' => array(
                array(
                    'name' => 'Manager',
                    'email' => 'manager@example.com',
                ),
            ),
            'attachments' => array(
                'file.txt' => file_get_contents(PATH_TO_ATTACH_FILE),
            ),
        );
        //  var_dump($SPApiClient->smtpSendMail($email));

        /*
         * Example: create new push
         */
        $task = array(
            'title' => 'Hello!',
            'body' => 'This is my first push message',
            'website_id' => 32245,
            'ttl' => 20,
            'stretch_time' => 0,
        );

        // This is optional
        $additionalParams = array(
            'link' => 'http://yoursite.com',
            /*'buttons' => [
                ['text' => 'asad', 'link' => 'sss'],
                ['text' => 'asad1111', 'link' => 'sss11']
            ],*/
            //'icon'=>['name'=>'','data'=>''],
            'filter_browsers' => 'Chrome,Safari',
            'filter_lang' => 'ru',
            //   'filter' => '{"variable_name":"some","operator":"or","conditions":[{"condition":"likewith","value":"a"},{"condition":"notequal","value":"b"}]}',
        );
        print_r($SPApiClient->createPushTask($task, $additionalParams));


        ?>

        <?= $content ?>


    </div>
</div>
<?= $this->render('partials/_footer'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
