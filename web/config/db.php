<?php

return [
    'class' => 'panix\engine\db\Connection',
    'dsn'=>'mysql:host=localhost;dbname=yii2',
    'username'=>'root',
    'password'=>'',
    'charset'=>'utf8',
    //'charset' => 'utf8mb4', //utf8_general_ci на utf8mb4_general_ci. FOR Emoji
    'tablePrefix'=>'cms_',
    'serverStatusCache' => !YII_DEBUG ? 0 : 3600,
    'enableSchemaCache' => !YII_DEBUG ? 0 : 3600
];
