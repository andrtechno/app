<?php

$config = [
    'id' => 'api',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
   // 'controllerNamespace' => 'app\commands',
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@uploads' => '@app/web/uploads',
    ],
    'modules' => [
        'v1' => [
            'basePath' => '@vendor/panix/mod-shop/api/v1',
            'class' => \panix\mod\shop\api\v1\Module::class,
        ],
        //'v2' => [
        //    'basePath' => '@app/modules/v2',
        //    'class' => \api\modules\v2\Module::class,
        // ]
       //'user' => ['class' => 'panix\mod\user\Module'],
    ],
    'controllerMap' => [
        'main' => 'panix\engine\controllers\WebController',
    ],
    'components' => [
        'user' => [
            'identityClass' => 'panix\mod\user\models\User',
            'enableAutoLogin' => true,
            'enableSession'=>false,
        ],
        'request' => [
           // 'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],

        'response' => [
            'class' => 'yii\web\Response',
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
        'errorHandler' => [
            'errorAction' => 'main/errorjson',
        ],
        'urlManager' => [
           // 'class' => 'panix\engine\ManagerUrl',
           // 'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            //'baseUrl' => '',
            //'normalizer' => [
            //    'class' => 'yii\web\UrlNormalizer',
            //    'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
           // ],
            'rules' => [
               // [
                    //'PUT,PATCH v1/country/<id>' => 'v1/update',
                   // 'DELETE users/<id>' => 'user/delete',
                   // 'GET,HEAD users/<id>' => 'user/view',
                   // 'POST api/v1/country' => 'v1/country/new',
                 //   'GET,HEAD api/v1/country' => 'v1/country/new',
                   // 'users/<id>' => 'user/options',
                   // 'users' => 'user/options',
               // ]
                [
                    'class' => yii\rest\UrlRule::class,
                    'controller' => 'v1/country',
                   // 'pluralize'=>false,
                    //'prefix'=>'api',
                    'extraPatterns' => [
                        'GET /new' => 'new',
                        'POST /login'=>'login',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ]

                ]

            ],
        ],
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'cache' => ['class' => 'yii\caching\FileCache'],
        //'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'db' => require(__DIR__ . '/../config/db.php'),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval'=>1000*10,
            'targets' => [
                'file1'=>[
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/db_error.log',
                    'categories' => ['yii\db\*']
                ],
                'file2'=>[
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/error.log',
                    // 'categories' => ['yii\db\*']
                ],
                'file3'=>[
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/warning.log',
                ],
                'file4'=>[
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/info.log',
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
/*
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
*/
return $config;
