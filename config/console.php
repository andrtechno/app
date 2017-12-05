<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');


$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db_local.php');

return [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'language' => 'ru',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'app\migrations',
            //    'panix\mod\discounts\migrations',
            ],
            'templateFile'=>'@vendor/panix/engine/views/migration.php',
            'generatorTemplateFiles' => [
                'create_table' => '@vendor/panix/engine/views/createTableMigration.php',
                'drop_table' => '@vendor/panix/engine/views/dropTableMigration.php',
                'add_column' => '@vendor/panix/engine/views/addColumnMigration.php',
                'drop_column' => '@vendor/panix/engine/views/dropColumnMigration.php',
                'create_junction' => '@vendor/panix/engine/views/createTableMigration.php'
            ],
            'useTablePrefix' => true,
            //'migrationPath' => '@app/migrations', // allows to disable not namespaced migration completely
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];
