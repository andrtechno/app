<?php

use yii\web\UrlNormalizer;

return [
    'class' => 'panix\engine\ManagerUrl',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'baseUrl' => '',
    //'suffix'=>'.html',
    //'ruleConfig' => [
    //    'class' => 'panix\engine\LanguageUrlRule' see ___LanguageUrlRule
    //],
    'normalizer' => [
       'class' => 'yii\web\UrlNormalizer',
        'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
    ],
    'rules' => [
        '' => 'main/index',
        'placeholder' => 'main/placeholder',

        //'/admin' => 'admin/admin/default/index',
       // 'admin/auth' => 'admin/auth/index',
        ['pattern' => 'like/<type:(up|down)>/<id:\d+>', 'route' => 'main/like'],

       // ['pattern' => 'admin/app/<controller:\w+>', 'route' => 'admin/admin/<controller>/index'],
        //['pattern' => 'admin/app/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => 'admin/admin/<controller>/<action>'],
      //  ['pattern' => 'admin/<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/<action>'],
        //['pattern' => 'admin/<module:\w+>', 'route' => '<module>/admin/default/index'],
        //['pattern' => 'admin/<module:\w+>/<controller:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/index'],
        //['pattern' => 'admin/<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>/<page:\d+>', 'route' => '<module>/admin/<controller>/<action>'],
        'http://test.yii2.pixelion.com.ua/posts' => 'admin/admin/default/index',
        ['pattern' => 'admin', 'route' => 'admin/admin/default/index'],
        ['pattern' => 'admin/auth', 'route' => 'admin/auth/index'],
        ['pattern' => 'admin/app/<controller:[0-9a-zA-Z_\-]+>', 'route' => 'admin/admin/<controller>/index'],
        ['pattern' => 'admin/app/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>', 'route' => 'admin/admin/<controller>/<action>'],
        ['pattern' => 'admin/<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/<action>'],
        ['pattern' => 'admin/<module:\w+>', 'route' => '<module>/admin/default/index'],
        ['pattern' => 'admin/<module:\w+>/<controller:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/index'],
        ['pattern' => 'admin/<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>/<page:\d+>', 'route' => '<module>/admin/<controller>/<action>'],

        // ['pattern' => 'sitemap-<id:\d+>', 'route' => '/sitemap/default/index', 'suffix' => '.xml'],
        // ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
    ],
];

