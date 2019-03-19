<?php

/**
 * Файл установки
 * @author CORNER CMS development team <dev@corner-cms.com>
 */
$params = require(__DIR__ . '/config/params.php');
$db = YII_DEBUG ? __DIR__ . '/config/db_local.php' : __DIR__ . '/config/db.php';


$config = [
    'id' => 'panix',
    'name' => 'CORNER CMS',
    'basePath' => dirname(__DIR__) . '/../',
    'bootstrap' => ['log'],
    'defaultRoute' => 'install/index',
    //'controllerNamespace' => 'app\modules\install\controllers',
    'controllerMap' => [
        'main' => 'app\modules\install\controllers\DefaultController',
    ],
    'modules' => [
        'install'=>['class'=>'app\modules\install\Module'],
    ],
    'components' => [
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
                'eav' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@mirocow/eav/messages',
                ],
            ],
        ],
        'db' => require($db),
        'cache' => ['class' => 'yii\caching\DummyCache'],
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'user' => ['class' => 'panix\mod\user\components\User'],
        // 'urlManager' => require(__DIR__ . '/config/urlManager.php'),
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
                    'levels' => ['error', 'warning'],
                ]
            ],
        ],
    ],
];

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'prod');

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../vendor/autoload.php');

use panix\engine\Application;

$app = new Application($config);
Yii::setAlias('@bower', dirname(__DIR__) . '/vendor/bower-asset');
$app->run();
