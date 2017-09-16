<?php

return [
    'class' => 'panix\engine\db\Connection',
    'dsn' => 'mysql:host=corner2.mysql.ukraine.com.ua;dbname=corner2_yii2',
    'username' => 'corner2_yii2',
    'password' => 'n96epfku',
    'charset' => 'utf8',
    'tablePrefix' => 'cms_',
    'serverStatusCache' => !YII_DEBUG ? 0 : 3600,
    'enableSchemaCache' => !YII_DEBUG ? 0 : 3600
];
