<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=corner2.mysql.ukraine.com.ua;dbname=corner2_cmsyii2',
    'username' => 'corner2_cmsyii2',
    'password' => 'j4cvs492',
    'charset' => 'utf8',
    'tablePrefix' => 'cms_',
    'serverStatusCache' => !YII_DEBUG ? 0 : 3600,
    'enableSchemaCache' => !YII_DEBUG ? 0 : 3600
];
