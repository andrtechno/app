<?php

//Yii::setAlias('@runtime', '@webroot/web/runtime');

Yii::setAlias('@console', dirname(__DIR__) . '/../console/web');

$config = [
    'id' => 'web',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__), //if in web dir
    'controllerNamespace' => 'panix\engine\controllers',
    'defaultRoute' => 'site/index',
    'bootstrap' => [
        'plugins',
        'panix\engine\plugins\goaway\GoAway',
        'panix\engine\widgets\webcontrol\WebInlineControl',
        //'webcontrol'
    ],
    'on beforeRequest' => function () {

        if (false) {
            Yii::$app->catchAll = [
                'maintenance/expired',
                'message' => 'Закончился период аренды интернет-магазина'
            ];
        }
        if (!Yii::$app->user->isGuest && Yii::$app->user->banTime) {
            if (strtotime(Yii::$app->user->banTime) >= time()) {
                Yii::$app->catchAll = [
                    'maintenance/banned',
                    'message' => Yii::$app->user->banReason,
                ];
            }
        }
        if (Yii::$app->settings->get('app', 'site_close') && false) {
            Yii::$app->catchAll = [
                'maintenance/index',
                //    'message' => 'Закончился период аренды интернет-магазина'
            ];
        }
    },
    'components' => [
        'plugins' => [
            'class' => 'panix\mod\plugins\components\PluginsManager',
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
	'view' => [
            'class' => 'panix\mod\plugins\components\View',
            'as Layout' => [
                'class' => 'panix\engine\behaviors\LayoutBehavior',
            ],
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    //'cachePath' => '@runtime/Smarty/cache',
                ],
            ],
            'theme' => [
                'class' => 'panix\engine\base\Theme'
            ],
        ],
        'stats' => ['class' => 'panix\mod\stats\components\Stats'],
        'geoip' => ['class' => 'panix\engine\components\geoip\GeoIP'],
        //'webcontrol' => ['class' => 'panix\engine\widgets\webcontrol\WebInlineControl'],

        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '',
            // 'csrfParam' => '_csrf-frontend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
			
			'csrfCookie' => [
                'sameSite' => PHP_VERSION_ID >= 70300 ? yii\web\Cookie::SAME_SITE_LAX : null,
            ],
        ],

        'errorHandler' => [
            //'class'=>'panix\engine\base\ErrorHandler'
            'errorAction' => 'site/error',
            // 'errorView' => '@webroot/themes/basic/views/layouts/error.php'
        ],
        'urlManager' => require(__DIR__ . '/urlManager.php'),
    ],
    //'on beforeRequest' => ['class' => 'panix\engine\base\ThemeView']
    /*'as access' => [
        'class' => panix\mod\rbac\filters\AccessControl::class,
        'allowActions' => [
            '/*',
            'admin/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],*/

];

if (YII_ENV_DEV) {
   // $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '*'],
        'dataPath'=>'@runtime/debug',
        'traceLine'=>function ($options, $panel) {
            $filePath = $options['file'];
            return strtr('<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>', ['{file}' => $filePath]);
        }
    ];
}

return $config;
