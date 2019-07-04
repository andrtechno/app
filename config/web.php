<?php

//Yii::setAlias('@runtime', '@webroot/web/runtime');

Yii::setAlias('@console', dirname(__DIR__) . '/../console/web');

$config = [
    'id' => 'web',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__), //if in web dir
    //'basePath' => dirname(__DIR__),

    'controllerNamespace' => 'panix\engine\controllers',
    'defaultRoute' => 'main/index',
    'bootstrap' => [
        'plugins',
        'panix\engine\plugins\goaway\GoAway',
        //'webcontrol'
    ],
    'controllerMap' => [
        'main' => 'panix\engine\controllers\WebController',
    ],
    'modules' => [
        'plugins' => [
            'class' => 'panix\mod\plugins\Module',
            'pluginsDir' => [
                '@panix/engine/plugins',
               // '@plugins/core',
            ]
        ],
        'telegram' => [
            'class' => 'panix\mod\telegram\Module',
            'hook_url' => 'https://yii2.pixelion.com.ua/telegram/default/hook', // must be https! (if not prettyUrl https://yourhost.com/index.php?r=telegram/default/hook)
            // 'db' => 'db2', //db file name from config dir
             'userCommandsPath' => '@telegram/commands/UserCommands',
            // 'timeBeforeResetChatHandler' => 60
        ],
        'sitemap' => [
            'class' => 'panix\mod\sitemap\Module',
        ],
        'banner' => [
            'class' => 'panix\mod\banner\Module',
        ],
        'rbac' => [
            'class' => 'panix\mod\rbac\Module',
            //'as access' => [
            //    'class' => panix\mod\rbac\filters\AccessControl::class
            //],
        ],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        'docs' => ['class' => 'panix\mod\docs\Module'],
        'presentation' => ['class' => 'panix\mod\presentation\Module'],
        'user' => ['class' => 'panix\mod\user\Module'],
        'compare' => ['class' => 'panix\mod\compare\Module'],
        'shop' => ['class' => 'panix\mod\shop\Module'],
        'cart' => ['class' => 'panix\mod\cart\Module'],
        //'stats' => ['class' => 'panix\mod\stats\Module'],
        //'hosting' => ['class' => 'app\modules\hosting\Module'],
        /* 'seo' => ['class' => 'app\modules\seo\Module'],


          'pages' => ['class' => 'panix\mod\pages\Module'],
          'shop' => ['class' => 'panix\mod\shop\Module'],
          'contacts' => ['class' => 'panix\mod\contacts\Module'],
          // 'cart' => ['class' => 'panix\mod\cart\Module'],
          'discounts' => ['class' => 'panix\mod\discounts\Module'],
          'sitemap' => ['class' => 'panix\mod\sitemap\Module'],
          'comments' => ['class' => 'panix\mod\comments\Module'],
          'wishlist' => ['class' => 'panix\mod\wishlist\Module'],
          'exchange1c' => ['class' => 'panix\mod\exchange1c\Module'],
          'csv' => ['class' => 'panix\mod\csv\Module'],
          //'csv' => ['class' => 'panix\mod\csv\Module'],
          'yandexmarket' => ['class' => 'panix\mod\yandexmarket\Module'],
          'delivery' => ['class' => 'panix\mod\delivery\Module'],
          'forum' => ['class' => 'panix\mod\forum\Module'],
          // 'portfolio' => ['class' => 'app\modules\portfolio\Module'],
          'images' => [
          'class' => 'panix\mod\images\Module',
          'imagesStorePath' => 'uploads/store', //path to origin images
          'imagesCachePath' => 'uploads/cache', //path to resized copies
          'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
          'placeHolderPath' => '@webroot/uploads/watermark.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
          'imageCompressionQuality' => 100, // Optional. Default value is 85.
          'waterMark' => '@webroot/uploads/watermark.png'
          ], */
    ],
    'components' => [

        'plugins' => [
            'class' => panix\mod\plugins\components\PluginsManager::class,
            'appId' => panix\mod\plugins\BasePlugin::APP_WEB,
            // by default
            'enablePlugins' => true,
            'shortcodesParse' => true,
            'shortcodesIgnoreBlocks' => [
                '<pre[^>]*>' => '<\/pre>',
                '<a[^>]*>' => '<\/a>',
               // '<div class="content[^>]*>' => '<\/div>',
            ]
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'panix\engine\widgets\recaptcha\ReCaptcha',
            'siteKey' => '6LfJqpYUAAAAAMKYmNUctjXeTkQrx74R2LHaM0r7',
            'secret' => '6LfJqpYUAAAAAGOItZcYABLTjDilBvgaAJE7vJL0',
        ],

        'sphinx' => [
            'class' => 'yii\sphinx\Connection',
            'dsn' => 'mysql:host=127.0.0.1;port=9306;',
            'username' => '',
            'password' => '',
        ],
        'fcm' => [
            'class' => 'understeam\fcm\Client',
            'apiKey' => 'AIzaSyAbeTCpxK7OGu_lXZDSnJjV1ItkUwPOBbc', // Server API Key (you can get it here: https://firebase.google.com/docs/server/setup#prerequisites)
        ],
        'stats' => ['class' => 'panix\mod\stats\components\Stats'],
        'geoip' => ['class' => 'panix\engine\components\geoip\GeoIP'],
        //'webcontrol' => ['class' => 'panix\engine\widgets\webcontrol\WebInlineControl'],
        'view' => [
            'class' => \panix\mod\plugins\components\View::class,
            'as Layout' => [
                'class' => \panix\engine\behaviors\LayoutBehavior::class,
            ],
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    //'cachePath' => '@runtime/Smarty/cache',
                ],
            ],
            'theme' => ['class' => 'panix\engine\base\Theme'],
        ],
        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            // 'csrfParam' => '_csrf-frontend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],

        'errorHandler' => [
            //'class'=>'panix\engine\base\ErrorHandler'
            //'errorAction' => 'site/error',
            'errorAction' => 'main/error',
            // 'errorView' => '@webroot/themes/basic/views/layouts/error.php'
        ],


        'urlManager' => require(__DIR__ . '/urlManager.php'),

    ],
    /*'as access' => [
        'class' => panix\mod\rbac\filters\AccessControl::class,
        'allowActions' => [
            '/*',
            //'admin/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],*/

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['modules']['debug']['class'] = 'yii\debug\Module';
    // $config['modules']['debug']['traceLine'] = '<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>';
    $config['modules']['debug']['traceLine'] = function ($options, $panel) {
        $filePath = $options['file'];
        // $filePath = str_replace(Yii::$app->basePath, 'file://~/path/to/your/backend', $filePath);
        // $filePath = str_replace(dirname(Yii::$app->basePath) . '/common', 'file://~/path/to/your/common', $filePath);
        /// $filePath = str_replace(Yii::$app->vendorPath, 'file://~/path/to/your/vendor', $filePath);
        return strtr('<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>', ['{file}' => $filePath]);
    };
    $config['modules']['debug']['panels'] = [
        'queue' => \yii\queue\debug\Panel::class,
    ];
    //$config['modules']['debug']['dataPath'] = '@runtime/debug';
    //$config['bootstrap'][] = 'gii';
    //$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
