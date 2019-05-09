<?php

use panix\engine\WebApplication;

error_reporting(E_ALL);
//Timezone
date_default_timezone_set("UTC");

// comment out the following two lines when deployed to production
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $env = 'dev';
    $debug = true;
} else {
    $env = 'prod';
    $debug = false;

}
defined('YII_DEBUG') or define('YII_DEBUG', $debug);
defined('YII_ENV') or define('YII_ENV', $env);

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../vendor/autoload.php');

$config = [
    'id' => 'install',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@uploads' => '@app/web/uploads',
    ],
    'controllerNamespace' => 'app\modules\install\controllers',
    //'defaultRoute' => 'install/index',
    'bootstrap' => [
        'log',
        // 'panix\engine\BootstrapModule'
    ],
    'controllerMap' => [
        'main' => 'panix\engine\controllers\WebController',
        'install' => 'app\modules\install\controllers\DefaultController',
    ],

    'modules' => [
        'install' => ['class' => 'app\modules\install\Module'],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        //'presentation' => ['class' => 'panix\mod\presentation\Module'],
        //'user' => ['class' => 'panix\mod\user\Module'],
        //'compare' => ['class' => 'panix\mod\compare\Module'],
        // 'seo' => ['class' => 'panix\mod\seo\Module'],
    ],
    'components' => [
        'user' => [
            'class' => 'panix\mod\user\components\WebUser',
            'enableAutoLogin' => true,
        ],
        'assetManager' => [
            'forceCopy' => YII_DEBUG,
            'appendTimestamp' => true
        ],
        'settings' => ['class' => 'panix\engine\components\Settings'],
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
            //  'class' => 'panix\engine\View',
            'class' => panix\mod\plugins\components\View::class,

            //'theme' => ['class' => 'panix\engine\base\Theme'],
        ],
        'request' => [
            // 'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'errorHandler' => [
            //'class'=>'panix\engine\base\ErrorHandler'
            //'errorAction' => 'site/error',
            'errorAction' => 'install/error',
            // 'errorView' => '@webroot/themes/basic/views/layouts/error.php'
        ],
        //'settings' => ['class' => 'panix\engine\components\Settings'],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'db' => require(__DIR__ . '/../config/db.php'),
        'urlManager' => [
            'class' => 'panix\engine\ManagerUrl',
            //'enablePrettyUrl' => false,
            'showScriptName' => true,
            //'enableStrictParsing' => true,
            //'baseUrl' => '',
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
            ],
            'rules' => [

                //  'install/<step:\w+>' => 'install/default',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/db.log',
                    'categories' => ['yii\db\*']
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/warning.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/info.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['profile'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/profile.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['trace'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/trace.log',
                ],
                [
                    'class' => 'panix\engine\log\EmailTarget',
                    'levels' => ['error', 'warning'],
                    'enabled' => false,//YII_DEBUG,
                    'categories' => ['yii\base\*'],
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:403',
                        'yii\web\HttpException:400',
                        'yii\i18n\PhpMessageSource::loadMessages'
                    ],
                    /*'message' => [
                        'from' => ['log@pixelion.com.ua'],
                        'to' => ['dev@pixelion.com.ua'],
                        'subject' => 'Ошибки базы данных на сайте app',
                    ],*/
                ],
                /*[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'logTable' => '{{%log_error}}',
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:403',
                        'yii\web\HttpException:400',
                        'yii\i18n\PhpMessageSource::loadMessages'
                    ],
                ],*/
            ],
        ],
    ],
];

use yii\web\Application;


$app = new WebApplication($config);
//$app = new yii\web\Application($config);
$app->run();
