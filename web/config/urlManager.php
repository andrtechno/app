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
        ['pattern' => 'admin/auth', 'route' => 'admin/auth'],
        ['pattern' => 'admin/app/<controller:\w+>', 'route' => 'admin/admin/<controller>/index'],
        ['pattern' => 'admin/app/<controller:\w+>/<action:\w+>', 'route' => 'admin/admin/<controller>/<action>'],
        ['pattern' => 'admin/app/<controller:\w+>/<action:\w+>/*', 'route' => 'admin/admin/<controller>/<action>'],
        ['pattern' => 'admin', 'route' => 'admin/default/index'],

        
        ['pattern' => 'admin/<module:\w+>', 'route' => '<module>/admin/default/index'],

        
        ['pattern' => 'admin/<module:\w+>/<controller:\w+>', 'route' => '<module>/admin/<controller>/index'],
        ['pattern' => 'admin/<module:\w+>/<controller:\w+>/<action:\w+>', 'route' => '<module>/admin/<controller>/<action>'],
        ['pattern' => 'admin/<module:\w+>/<controller:\w+>/<action:\w+>/*', 'route' => '<module>/admin/<controller>/<action>'],

        ['pattern' => '<module:\w+>', 'route' => '<module>/default'],
        ['pattern' => '<module:\w+>/<controller:\w+>', 'route' => '<module>/<controller>'],
        ['pattern' => '<module:\w+>/<controller:\w+>/<action:\w+>', 'route' => '<module>/<controller>/<action>'],

        
    /*
      'admin' => 'admin/default/index',
      'admin/auth' => 'admin/auth',
      'admin/app/<controller:\w+>' => 'admin/admin/<controller>/index',
      'admin/app/<controller:\w+>/<action>' => 'admin/admin/<controller>/<action>',
      'admin/<module:\w+>' => '<module>/admin/default',
      'admin/<module:\w+>/<controller:\w+>' => '<module>/admin/<controller>',
      'admin/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/admin/<controller>/<action>',
      'admin/<module:\w+>/<controller:\w+>/<action:\w+>/*' => '<module>/admin/<controller>/<action>',
     */




















    /* 'admin/<module:\w+>' => '<module>/admin/default/index',
      'admin/<module:\w+>/<action:\w+>' => '<module>/admin/default/<action>',
      'admin/<module:\w+>/<action:\w+>/<id>' => '<module>/admin/default/<action>',
      'admin/<module:\w+>/<controller:\w+>' => '<module>/admin/<controller>/index',
      'admin/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/admin/<controller>/<action>', */
    // '<module:\w+>' => '<module>/default/index',
    // '<module:\w+>/<action:\w+>' => '<module>/default/<action>',
    //'<module:\w+>/<action:\w+>/<id>' => '<module>/default/<action>',
    //  'products' => 'shop/product/list',
    //  'product/<url>' => 'shop/product/view',
    // 'page/<url>' => 'pages/default/view',
    // 'cart/add' => 'cart/default/add',
    //  [
    ///      'pattern'=>'<category_url:\w+>',
    //      'route'=>'shop/category/view',
    //      'suffix'=>''
    //  ]
    ],
];
?>
