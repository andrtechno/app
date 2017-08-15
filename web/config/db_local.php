<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix' => 'cms_',
    'serverStatusCache' => !YII_DEBUG ? 0 : 3600,
    'enableSchemaCache' => !YII_DEBUG ? 0 : 3600
];
