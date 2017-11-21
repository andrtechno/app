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
    //'sourceLanguage'=>'ru',
    // 'runtimePath'=>'runtime',
    'controllerNamespace' => 'panix\engine\controllers',
    'defaultRoute' => 'main/main',
    'bootstrap' => ['webcontrol', 'log', 'maintenanceMode'], //, 'seo'
    'controllerMap' => [
        'main' => 'panix\engine\controllers\WebController',
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'app\migrations',
                'panix\mod\discounts\migrations',
            ],
        //'migrationPath' => null, // allows to disable not namespaced migration completely
        ]
    ],
    'modules' => [


        'log' => [
            'class' => 'bariew\logModule\Module'
        ],
        'user' => ['class' => 'panix\mod\user\Module'],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        'pages' => ['class' => 'panix\mod\pages\Module'],
        'shop' => ['class' => 'panix\mod\shop\Module'],
        'contacts' => ['class' => 'panix\mod\contacts\Module'],
        'cart' => ['class' => 'panix\mod\cart\Module'],
        'discounts' => ['class' => 'panix\mod\discounts\Module'],
        'sitemap' => ['class' => 'panix\mod\sitemap\Module'],
        'comments' => ['class' => 'panix\mod\comments\Module'],
        'wishlist' => ['class' => 'panix\mod\wishlist\Module'],
        'exchange1c' => ['class' => 'panix\mod\exchange1c\Module'],
        'csv' => ['class' => 'panix\mod\csv\Module'],
        'blocks' => ['class' => 'profitcode\blocks\Module'],
        //'csv' => ['class' => 'panix\mod\csv\Module'],
        'yandexmarket' => ['class' => 'panix\mod\yandexmarket\Module'],
        'delivery' => ['class' => 'panix\mod\delivery\Module'],
        'forum' => ['class' => 'panix\mod\forum\Module'],
       // 'portfolio' => ['class' => 'app\modules\portfolio\Module'],
        //'seo' => ['class' => 'aquy\seo\module\Meta'],
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
        'geoip' => ['class' => 'panix\engine\components\geoip\GeoIP'],
        'webcontrol' => ['class' => 'panix\engine\widgets\webcontrol\WebInlineControl'],
        // 'seo' => [
        //     'class' => 'aquy\seo\components\Seo'
        // ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'mode' => Pdf::MODE_UTF8,
        ],
        // 'languageSwitcher' => [
        //     'class' => 'panix\engine\widgets\langSwitcher\LangSwitcher',
        // ],
        'formatter' => [
            'class' => 'panix\engine\i18n\Formatter',
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
                'yii\jui\JuiAsset' => [
                    'js' => [
                        'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'
                    ]
                ],
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
            'as Layout' => [
                'class' => \panix\engine\behaviors\LayoutBehavior::className(),
            ],
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                //'cachePath' => '@runtime/Smarty/cache',
                ],
            ],
            'theme' => ['class' => 'panix\engine\base\Theme'],
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
                        'app/geoip_country' => 'geoip_country.php',
                        'app/geoip_city' => 'geoip_city.php',
                    ],
                ],
            ],
        ],
        'session' => [
            'class' => '\panix\engine\web\DbUserSession',
            'sessionTable' => '{{%session_user}}', // session table name. Defaults to 'session'.
        ],
        'session22' => [
            'class' => 'yii\web\DbSession',
            //'sessionTable'=>'{{%session}}',
            // 'timeout'=> 5,
            'useCookies' => true
        ],
        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'cache' => [
            //   'class' => 'yii\caching\FileCache',
            'class' => 'yii\caching\DummyCache',
        // 'class' => 'yii\caching\DbCache',
        // 'cachePath' => '@runtime/cache',
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
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '323564730067-0guk795ucs29o9l86db8tocj8sijn130.apps.googleusercontent.com',
                    'clientSecret' => 'cQp5F8dX5ww0uLnAbAMt9BFu',
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
            //'class'=>'panix\engine\base\ErrorHandler'
            //'errorAction' => 'site/error',
            'errorAction' => 'main/error',
        // 'errorView' => '@webroot/themes/corner/views/layouts/error.php'
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
       /* 'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [[
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
                ]],
        ],*/
               'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'logTable' => '{{%log_error}}',
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:403',
                        'yii\web\HttpException:400',
                        'yii\i18n\PhpMessageSource::loadMessages'
                    ],
                ],
            ]
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
    //$config['modules']['debug']['traceLine'] = '<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>';
    //$config['modules']['debug']['dataPath'] = '@runtime/debug';
    //$config['bootstrap'][] = 'gii';
    //$config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
