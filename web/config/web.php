<?php

//Yii::setAlias('@runtime', '@webroot/web/runtime');
$params = require(__DIR__ . '/params.php');
$db = YII_DEBUG ? __DIR__ . '/db_local.php' : __DIR__ . '/db.php';
$config = [
    'id' => 'panix',
    'name' => 'CORNER CMS',
    'basePath' => dirname(__DIR__) . '/../',
    'language' => 'ru',
    // 'runtimePath'=>'runtime',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => ['class' => 'panix\user\Module'],
        'admin' => ['class' => 'panix\admin\Module'],
        'pages' => ['class' => 'panix\pages\Module'],
        'shop' => ['class' => 'panix\shop\Module'],
        // 'shop' => ['class' => 'app\system\modules\shop\Module'],
        // 'shop' => ['class' => 'panix\module-shop\Module'],
        'cart' => ['class' => 'app\system\modules\cart\Module'], //app\system\modules\cart\Module
        'eav' => ['class' => 'mirocow\eav\Module'],

    ],
    'components' => [
        'currency' => ['class' => 'panix\shop\components\CurrencyManager'],
        'cart' => ['class' => 'panix\cart\components\Cart'],
        /* 'assetManager' => [
          'forceCopy' => YII_DEBUG,
          'linkAssets'=>true,
          'bundles' => [
          'yii\web\JqueryAsset' => [
          //'sourcePath' => null,   // do not publish the bundle
          'css' => ['themes/dot-luv/jquery-ui.css'],
          'js' => [
          YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
          ]
          ],
          ],
          ], */
        'view' => [
            'class' => 'panix\engine\View',
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/corner/views'],
                'baseUrl' => '@web/themes/corner',
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/system/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/admin' => 'admin.php',
                        'app/month' => 'month.php',
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
            'class' => 'panix\user\components\User',
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
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'useFileTransport' => true,
            'messageConfig' => [
                'from' => ['dev@corner-cms.com' => 'Admin'], // this is needed for sending emails
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
