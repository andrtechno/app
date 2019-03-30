<?php

use yii\web\UrlNormalizer;

//Yii::setAlias('@runtime', '@webroot/web/runtime');


defined('DB_FILE') or define('DB_FILE', YII_DEBUG ? __DIR__ . '/db_local.php' : __DIR__ . '/db.php');

$config = [
    'id' => 'install',
    'name' => 'PIXELION CMS',
    'language' => 'ru',
    'basePath' => dirname(__DIR__) . '/../',
    'bootstrap' => ['log'],
    'defaultRoute' => 'install/index',
    // 'controllerNamespace' => 'app\modules\install\controllers',
    'controllerMap' => [
        'install' => 'app\modules\install\controllers\DefaultController',
    ],
    'modules' => [
        'install' => ['class' => 'app\modules\install\Module'],
       // 'portfolio' => ['class' => 'panix\mod\portfolio\Module'],
        'user' => ['class' => 'panix\mod\user\Module'],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        
    ],
    'components' => [

        'assetManager' => [
            'forceCopy' => YII_DEBUG,
            'bundles' => [
                'yii\jui\JuiAsset' => [
                    'js' => [
                        'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'
                    ]
                ],
            ],
            //'linkAssets' => true,
            'appendTimestamp' => false
        ],
        'errorHandler' => [
            'errorAction' => 'install/error',
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
                'install*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/modules/install/messages',
                    'fileMap' => [
                        'install/default' => 'default.php',
                    ],
                ],
            ],
        ],
        'view' => [
            'class' => 'panix\engine\View',
        // 'theme' => ['class' => 'panix\engine\base\Theme'],
        ],
        'db' => require(DB_FILE),
        'cache' => ['class' => 'yii\caching\DummyCache'],
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'user' => ['class' => 'panix\mod\user\components\User'],
        //'urlManager' => require(__DIR__ . '/urlManager.php'),
        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','info'],
                ]
            ],
        ],
    ],
];

return $config;
