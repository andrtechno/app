<?php

Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend/web');
Yii::setAlias('@backend', dirname(__DIR__) . '/web');
Yii::setAlias('@api', dirname(__DIR__) . '/apis');

$db = YII_DEBUG ? dirname(__DIR__) . '/../common/config/db_local.php' : dirname(__DIR__) . '/../common/config/db.php';

$config = [
    'id' => 'api',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    //'sourceLanguage'=>'ru',
    'runtimePath' => '@app/api/runtime',
   // 'controllerNamespace' => 'panix\engine\controllers',
    //'defaultRoute' => 'main/main',
    'bootstrap' => [
        'log',
       // 'panix\engine\BootstrapModule'
    ],
   // 'controllerMap' => [
        //'main' => 'panix\engine\controllers\WebController',
       // 'backend' => 'panix\engine\controllers\AdminController',
  //  ],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'   // here is our v1 modules
        ],
        'user' => ['class' => 'panix\mod\user\Module'],

    ],
    'components' => [
        'formatter' => [
            'class' => 'panix\engine\i18n\Formatter'
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
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'class' => 'panix\mod\user\components\WebUser',
            'enableAutoLogin' => false,
            // 'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
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
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'urlManager' => [
           // 'class' => 'panix\engine\ManagerUrl',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'baseUrl' => '',
            //'normalizer' => [
            //    'class' => 'yii\web\UrlNormalizer',
            //    'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
            //],
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/country',
                    'prefix' => 'api',
                    'tokens' => [
                        '{id}' => '<id:\w+>'
                    ]
                ]
            ],
        ],
        'db' => require($db),
    ],
    /*'as access' => [
        'class' => panix\mod\rbac\filters\AccessControl::class,
        'allowActions' => [
           // '/*',
            'admin/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],*/
    'params' => require(dirname(__DIR__) . '/../common/config/params.php'),
];

return $config;