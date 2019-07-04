<?php

return [
    'id' => 'console',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__),
    //'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','telegram','queue','panix\engine\BootstrapModule'],
    'controllerNamespace' => 'app\commands',
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@uploads' => '@app/web/uploads',
    ],
    'modules' => [
        'sitemap' => ['class' => 'panix\mod\sitemap\Module'],
        //'sendpulse' => ['class' => 'panix\mod\sendpulse\Module'],
        'seo' => ['class' => 'panix\mod\seo\Module'],
        'shop' => ['class' => 'panix\mod\shop\Module'],
        'cart' => ['class' => 'panix\mod\cart\Module'],
        'plugins' => [
            'class' => 'panix\mod\plugins\Module',
            'pluginsDir' => [
                // '@plugins/core',
                '@panix/engine/plugins',
            ]
        ],
        'telegram' => [
            'class' => 'panix\mod\telegram\Module',
            'hook_url' => 'https://yii2.pixelion.com.ua/telegram/default/hook', // must be https! (if not prettyUrl https://yourhost.com/index.php?r=telegram/default/hook)
            // 'db' => 'db2', //db file name from config dir
            'userCommandsPath' => '@telegram/commands/UserCommands',
            // 'timeBeforeResetChatHandler' => 60
        ],
        'banner' => ['class' => 'panix\mod\banner\Module'],
        //'rbac' => [
        //    'class' => 'panix\mod\rbac\Module',
        //    'as access' => [
        //        'class' => panix\mod\rbac\filters\AccessControl::class
        //    ],
        // ],
        //'admin' => ['class' => 'panix\mod\admin\Module'],
        'user' => ['class' => 'panix\mod\user\Module'],
    ],
    'controllerMap' => [
        'sitemap' => [
            'class' => 'panix\mod\sitemap\console\CreateController',
        ],
        'migrate' => ['class' => 'panix\engine\console\controllers\MigrateController',
            //'migrationPath' => '@console/migrations',
            // 'migrationNamespaces' => [
            //  'console\migrations',
            // 'lo\plugins\migrations',
            // ],
        ]
    ],
    'components' => [
        'queue' => [
            'class' => \yii\queue\file\Queue::class,
            'as log' => \yii\queue\LogBehavior::class,
            // Индивидуальные настройки драйвера
        ],
        //'session' => [
        //    'class' => 'yii\web\Session'
        // ],

        'urlManager' => require(__DIR__ . '/urlManager.php'),
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'cache' => ['class' => 'yii\caching\FileCache'],
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        //'urlManager' => require(__DIR__ . '/urlManager.php'),
        'db' => require(__DIR__ . '/../config/db_local.php'),
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
