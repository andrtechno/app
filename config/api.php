<?php

$config = [
    'id' => 'api',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'panix\mod\shop\api\Bootstrap'
    ],
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@api' => dirname(__DIR__, 1) . '/api',
        '@app' => dirname(__DIR__, 1) . '/',
        '@uploads' => '@app/web/uploads',
    ],
    'modules' => [
        'shop' => [
            'class' => 'panix\mod\shop\api\Module'
        ],
        //'user' => ['class' => 'panix\mod\user\Module'],
    ],
    'controllerMap' => [
        'api' => 'panix\engine\controllers\ApiController',
    ],
    'components' => [
        'user' => [
            'identityClass' => 'panix\mod\user\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
        ],
        'request' => [
            'parsers' => ['application/json' => 'yii\web\JsonParser'],
            'enableCsrfCookie' => false,
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'charset' => 'UTF-8',
            'format' => yii\web\Response::FORMAT_JSON,
            'acceptParams'=>['version'=>'v1'],
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'default' => 'default.php',
                    ],
                ],
                'app/*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/panix/engine/messages',
                    'fileMap' => [
                        'app/default' => 'default.php',
                        'app/admin' => 'admin.php',
                        'app/month' => 'month.php',
                        'app/error' => 'error.php',
                        'app/geoip_country' => 'geoip_country.php',
                        'app/geoip_city' => 'geoip_city.php',
                    ],
                ],
            ],
        ],
        'errorHandler' => [
            'class' => 'panix\engine\api\ErrorHandler',
            'errorAction' => 'api/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName'  => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
            ],
            'rules' => [
                '/' => 'api/index',
            ],
        ],
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'cache' => [
            'directoryLevel' => 0,
            'keyPrefix' => '',
            'class' => 'yii\caching\FileCache'
        ],
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'db' => require(__DIR__ . '/../config/db.php'),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval' => 1000 * 10,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/api/' . date('Y-m-d') . '/db_error.log',
                    'categories' => ['yii\db\*']
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/api/' . date('Y-m-d') . '/error.log',
                    // 'categories' => ['yii\db\*']
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/api/' . date('Y-m-d') . '/warning.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/api/' . date('Y-m-d') . '/info.log',
                ],
                /*[
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['profile'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/profile.log',
                ],*/
                /*[
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['trace'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/trace.log',
                ],*/
            ],
        ],
    ],
    'params' => require(__DIR__ . '/../config/params.php'),
];

return $config;
