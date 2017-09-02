<?php

use yii\web\UrlNormalizer;

return [
    'class' => 'panix\engine\ManagerUrl',
    'languages' => ['ua' => 'uk', 'en', 'ru'],
    // 'class' => 'panix\engine\LangUrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    // 'suffix'=>'path',
    'normalizer' => [
        'class' => 'yii\web\UrlNormalizer',
        // use temporary redirection instead of permanent for debugging
        'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
    ],
    'rules' => [
        '' => 'site/index',
        'placeholder' => 'site/placeholder',
        //Backend rules
        ['pattern' => 'admin/auth', 'route' => 'admin/auth'],
        ['pattern' => 'admin/app/<controller:\w+>', 'route' => 'admin/admin/<controller>/index'],
        ['pattern' => 'admin/app/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => 'admin/admin/<controller>/<action>'],
        ['pattern' => 'admin/app/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>/*', 'route' => 'admin/admin/<controller>/<action>'],
        ['pattern' => 'admin', 'route' => 'admin/default/index'],
        ['pattern' => 'admin/<module:\w+>', 'route' => '<module>/admin/default/index'],
        ['pattern' => 'admin/<module:\w+>/<controller:\w+>', 'route' => '<module>/admin/<controller>/index'],
        ['pattern' => 'admin/<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/<action>'],
        ['pattern' => 'admin/<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>/*', 'route' => '<module>/admin/<controller>/<action>'],
        //Frontend rolues
        ['pattern' => '<module:\w+>', 'route' => '<module>/default'],
        ['pattern' => '<module:\w+>/<controller:\w+>', 'route' => '<module>/<controller>'],
        ['pattern' => '<module:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/default/<action>'],
        //['pattern' => '<module:\w+>/<controller:\w+>', 'route' => '<module>/<controller>/index'],
        
        ['pattern' => '<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/<controller>/<action>'],
        ['pattern' => '<module:\w+>/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>/*', 'route' => '<module>/<controller>/<action>'],
    ],
];
?>
