<?php

return [
    'class' => 'panix\engine\db\Connection',
   // 'dsn'=>'mysql:host=pix1.mysql.tools;dbname=pix1_v2',
   // 'username'=>'pix1_v2',
   // 'password'=>'uev8f9g8',
    'dsn'=>'mysql:host=localhost;dbname=yii2',
    'username'=>'root',
    'password'=>'47228960panix',
    'charset' => 'utf8',
    //'on afterOpen' => function($event) {
        //$event->sender->createCommand("SET time_zone = '" . date('P') . "'")->execute();
        //$event->sender->createCommand("SET names utf8")->execute();
    //},
    //'charset' => 'utf8mb4', //utf8_general_ci на utf8mb4_general_ci. FOR Emoji
    'tablePrefix' => 'cms_',
    'serverStatusCache' => YII_DEBUG ? 0 : 3600,
    'schemaCacheDuration' => YII_DEBUG ? 0 : 3600*24,
    'enableSchemaCache' => true,
    'schemaCache' => 'cache',
];
