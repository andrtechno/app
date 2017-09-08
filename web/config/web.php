<?php

use panix\engine\pdf\Pdf;

//Yii::setAlias('@runtime', '@webroot/web/runtime');
$params = require(__DIR__ . '/params.php');
$db = YII_DEBUG ? __DIR__ . '/db_local.php' : __DIR__ . '/db.php';
$config = [
    'id' => 'panix',
    'name' => 'CORNER CMS',
    'basePath' => dirname(__DIR__) . '/../',
    'language' => 'ru',
    //'sourceLanguage'=>'en',
    // 'runtimePath'=>'runtime',
    // 'controllerNamespace' => 'panix\engine\controllers',
    'defaultRoute' => 'main/index',
    'bootstrap' => ['log', 'maintenanceMode'],
    'controllerMap' => [
         'main' => 'panix\engine\controllers\WebController',
     ],
    'modules' => [
        'user' => ['class' => 'panix\mod\user\Module'],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        'pages' => ['class' => 'panix\mod\pages\Module'],
        'shop' => ['class' => 'panix\mod\shop\Module'],
        //'news' => ['class' => 'panix\mod\news\Module'],
        'contacts' => ['class' => 'panix\mod\contacts\Module'],
        'cart' => ['class' => 'panix\mod\cart\Module'], //app\system\modules\cart\Module
        'eav' => ['class' => 'mirocow\eav\Module'],
        'images' => [
            'class' => 'panix\mod\images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'uploads/store', //path to origin images
            'imagesCachePath' => 'uploads/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@webroot/uploads/watermark.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 100, // Optional. Default value is 85.
            'waterMark' => '@webroot/uploads/watermark.png'
        ],
    ],
    'components' => [
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'mode' => Pdf::MODE_UTF8,
        // refer settings section for all configuration options
        ],
        // 'languageSwitcher' => [
        //     'class' => 'panix\engine\widgets\langSwitcher\LangSwitcher',
        // ],
        'formatter' => [
            //  'class' => 'panix\engine\i18n\Formatter',
            'locale' => 'ru-RU',
            'dateFormat' => 'd.MM.Y',
            'timeFormat' => 'H:mm:ss',
            // 'datetimeFormat' => 'd.MM.Y HH:mm',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
            //'decimalSeparator' => ',',
            // 'thousandSeparator' => ' ',
            'currencyCode' => 'UAH',
        ],
        'currency' => ['class' => 'panix\mod\shop\components\CurrencyManager'],
        'cart' => ['class' => 'panix\mod\cart\components\Cart'],
        'maintenanceMode' => [
            'class' => 'panix\engine\maintenance\MaintenanceMode',
            // Allowed roles
            'roles' => [
            //    'admin',
            ],
            //Retry-After header
            'retryAfter' => 120 //or Wed, 21 Oct 2015 07:28:00 GMT for example
        ],
        'assetManager' => [
            'forceCopy' => YII_DEBUG,
            'bundles' => [
                'panix\lib\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyAqDp9tu6LqlD6I1chjuZNV3yS6HNB_3Q0 ',
                        'language' => 'ru',
                        'version' => '3.1.18'
                    ]
                ]
            ],
            //'linkAssets' => true,
            'appendTimestamp' => false
        ],
        'view' => [
            'class' => 'panix\engine\View',
            'theme' => [
                'class' => 'panix\engine\base\Theme',
            ],
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/panix/engine/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/admin' => 'admin.php',
                        'app/month' => 'month.php',
                        'app/error' => 'error.php',
                    ],
                ],
                'eav' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@mirocow/eav/messages',
                ],
            ],
        ],
        'session' => [
            'class' => 'yii\web\Session',
        ],
        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@runtime/cache',
        // 'class' => 'yii\caching\ApcCache',
        ],
        'user' => [
            'class' => 'panix\mod\user\components\User',
        // 'identityClass' => 'app\models\User',
        // 'enableAutoLogin' => false,
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\GoogleOpenId'
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => 'facebook_client_id',
                    'clientSecret' => 'facebook_client_secret',
                ],
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '4375462',
                    'clientSecret' => '0Rr2U4iCdisssqDor1tY',
                ],
            ],
        ],
        'errorHandler' => [
            //'errorAction' => 'site/error',
            // 'errorAction' => 'webtest/error',
            'errorView' => '@webroot/themes/corner/views/layouts/error.php'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'useFileTransport' => true,
            //'layoutsPath' => '@web/mail/layouts',
            //'viewsPath' => '@web/mail/views',
            'messageConfig' => [
                //    'from' => ['dev@corner-cms.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [[
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
                ]],
        ],
        'languageManager' => array('class' => 'panix\engine\ManagerLanguage'),
        'settings' => array('class' => 'panix\engine\components\Settings'),
        'urlManager' => require(__DIR__ . '/urlManager.php'),
        'db' => require($db),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug']['class'] = 'yii\debug\Module';
    //$config['modules']['debug']['dataPath'] = '@runtime/debug';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
