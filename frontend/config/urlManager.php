<?php

use yii\web\UrlNormalizer;

return [
    'class' => 'panix\engine\ManagerUrl',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    //'enableStrictParsing' => false,
    'baseUrl' => '/',
    //'suffix'=>'path',
    //'ruleConfig' => [
    //    'class' => 'panix\engine\LanguageUrlRule' see ___LanguageUrlRule
    //],
    'normalizer' => [
        'class' => 'yii\web\UrlNormalizer',
        'action' => UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
    ],
    'rules' => [
        'placeholder' => 'main/placeholder',


        // ['pattern' => 'sitemap-<id:\d+>', 'route' => '/sitemap/default/index', 'suffix' => '.xml'],
        // ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
    ],
];

