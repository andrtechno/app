<?php

return [
    'class' => 'panix\engine\db\Connection',
    //'dsn' => 'mysql:host=corner2.mysql.tools;dbname=corner2_yii2',
    //'username' => 'corner2_yii2',
    //'password' => 'n96epfku',
    'dsn'=>'mysql:host=corner2.mysql.tools;dbname=corner2_yii2',
    'username'=>'corner2_yii2',
    'password'=>'n96epfku',
    'charset' => 'utf8',
    //'on afterOpen' => function($event) {
        //$event->sender->createCommand("SET time_zone = '" . date('P') . "'")->execute();
        //$event->sender->createCommand("SET names utf8")->execute();
    //},
    //'charset' => 'utf8mb4', //utf8_general_ci на utf8mb4_general_ci. FOR Emoji
    'tablePrefix' => 'cms_',
    'serverStatusCache' => !YII_DEBUG ? 0 : 3600,
    'enableSchemaCache' => !YII_DEBUG ? 0 : 3600
];
