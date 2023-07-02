<?php

return [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    //'basePath' => dirname(__DIR__),
    //'bootstrap' => ['queue'], //'telegram',
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@webroot' => dirname(dirname(__FILE__)) . '/web',
        '@web' => dirname(dirname(__FILE__)) . '/web',
    ],
    'controllerMap' => [
        'migrate' => ['class' => 'panix\engine\console\controllers\MigrateController',
            //'migrationPath' => '@console/migrations',
            'migrationNamespaces' => [
                //  'console\migrations',
                // 'lo\plugins\migrations',
                //'app\migrations',
                // 'yii\rbac\migrations'
            ],
            'migrationPath' => ['@app/migrations', '@yii/rbac/migrations'], //,'@vendor/panix/mod-rbac/migrations'
        ]
    ],
    'components' => [
        'sitemap' => [
            'class' => 'panix\mod\sitemap\components\Sitemap',
            'models' => [
                'panix\mod\shop\models\Product',
                'panix\mod\shop\models\Category',
                'panix\mod\pages\models\Page',
            ],

        ],
        'request' => [
            'class' => 'yii\console\Request',
            //'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'user' => [
            'enableSession' => false,
            'enableAutoLogin' => false,
        ],
	'urlManager' => array_merge(require(__DIR__ . '/urlManager.php'),['hostInfo'=>'https://example.loc/']),
        /*'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'flushInterval' => 1000 * 10,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . DATE_LOG . '/console/db_error.log',
                    'categories' => ['yii\db\*']
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . DATE_LOG . '/console/error.log',
                    // 'categories' => ['yii\db\*']
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . DATE_LOG . '/console/warning.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . DATE_LOG . '/console/info.log',
                ],
            ],
        ],*/
    ],
];
