<?php
// s
return [
    'class' => 'panix\engine\db\Connection',
    'dsn'=>'mysql:host=localhost;dbname=yii2',
    'username'=>'root',
    'password'=>'',
    //'charset'=>'utf8',
    'charset' => 'utf8mb4', //utf8_general_ci на utf8mb4_general_ci. FOR Emoji
    //'on afterOpen' => function($event) {
        //$event->sender->createCommand("SET time_zone = '" . date('P') . "'")->execute();
        //$event->sender->createCommand("SET names utf8")->execute();
    //},
    'tablePrefix'=>'cms_',
    'serverStatusCache' => !YII_DEBUG ? 0 : 3600,
    'enableSchemaCache' => !YII_DEBUG ? 0 : 3600,
    'schemaCacheDuration'=>!YII_DEBUG ? 0 : 3600,
];
