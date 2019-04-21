<?php
use panix\engine\pdf\Pdf;

$config = [
    'id' => 'backend',
    'homeUrl' => '/',
    'basePath' => dirname(__DIR__) . '/../',
   // 'runtimePath' => '@app/backend/runtime',
    'controllerNamespace' => 'panix\engine\controllers',
    //'defaultRoute' => 'main/main',
    'modules' => [
        'sitemap' => ['class' => 'app\modules\sitemap\Module'],
        'sendpulse' => ['class' => 'panix\mod\sendpulse\Module'],
        //'documentation' => ['class' => 'app\modules\documentation\Module'],
        'plugins' => [
            'class' => 'panix\mod\plugins\Module',
            'pluginsDir' => [
                // '@plugins/core',
                '@panix/engine/plugins',
            ]
        ],
        'rbac' => [
            'class' => 'panix\mod\rbac\Module',
            'as access' => [
                'class' => panix\mod\rbac\filters\AccessControl::class
            ],
        ],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        'user' => ['class' => 'panix\mod\user\Module'],
    ],
    'components' => [
        'pdf' => [
            'class' => Pdf::class,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'mode' => Pdf::MODE_UTF8,
        ],
        'view' => [
            'theme' => [
                'class' => 'panix\engine\base\Theme',
                'name' => 'dashboard'
            ],
        ],
        'plugins' => [
            'class' => panix\mod\plugins\components\PluginsManager::class,
            'appId' => panix\mod\plugins\BasePlugin::APP_BACKEND,
            // by default
            'enablePlugins' => true,
            'shortcodesParse' => true,
            'shortcodesIgnoreBlocks' => [
                '<pre[^>]*>' => '<\/pre>',
                // '<div class="content[^>]*>' => '<\/div>',
            ]
        ],
        'request' => [
        //    'class' => 'panix\engine\WebRequest',
           'baseUrl' => '/admin',
        ],

        'errorHandler' => [
            //'class'=>'panix\engine\base\ErrorHandler'
            'errorAction' => 'backend/error',
            // 'errorView' => '@webroot/themes/basic/views/layouts/error.php'
        ],

        'urlManager' => [
           // 'class' => 'panix\engine\ManagerUrl',
           // 'enablePrettyUrl' => true,
           // 'showScriptName' => false,
           // 'enableStrictParsing' => true,
            'baseUrl' => '',
           // 'normalizer' => [
           //     'class' => 'yii\web\UrlNormalizer',
           //     'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
           // ],
            'rules' => [
              //  'placeholder' => 'main/placeholder',
                ['pattern' => '', 'route' => 'admin/admin/default/index'],
                ['pattern' => 'auth', 'route' => 'admin/auth/index'],
                ['pattern' => 'app/<controller:\w+>', 'route' => 'admin/admin/<controller>/index'],
                ['pattern' => 'app/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => 'admin/admin/<controller>/<action>'],
                ['pattern' => '<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/<action>'],
                ['pattern' => '<module:\w+>', 'route' => '<module>/admin/default/index'],
                ['pattern' => '<module:\w+>/<controller:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/index'],
                ['pattern' => '<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>/<page:\d+>', 'route' => '<module>/admin/<controller>/<action>'],

            ],
        ],
    ],
];

return $config;