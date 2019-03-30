<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
Yii::setAlias('@webroot', dirname(__DIR__) . '/web');

Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend/web');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend/web');
Yii::setAlias('@common', dirname(dirname(__DIR__)) . '/common');


$params = require(dirname(__DIR__) . '/../common/config/params.php');
$db = require(dirname(__DIR__) . '/../common/config/db_local.php');

return [
    'id' => 'console',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__) . '/../',
    //'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],//, 'panix\engine\BootstrapModule'
    'controllerNamespace' => 'app/console/commands',
    'language' => 'ru',
    'runtimePath' => '@app/runtime',
    'modules' => [
        'gii' => ['class' => 'yii\gii\Module'],
        //'shop' => ['class' => 'panix\mod\shop\Module'],
        //'images' => ['class' => 'panix\mod\images\Module'],
        //'cart' => ['class' => 'panix\mod\cart\Module'],
        //'pages' => ['class' => 'panix\mod\pages\Module'],
        //'exchange1c' => ['class' => 'panix\mod\exchange1c\Module'],
        //'user' => ['class' => 'panix\mod\user\Module'],
        //'wishlist' => ['class' => 'panix\mod\wishlist\Module'],
        //'admin' => ['class' => 'panix\mod\admin\Module'],
    ],
    'controllerMap' => [
        'sitemap' => [
            'class' => 'app\modules\sitemap\console\CreateController',
        ],
        //'migrate' => [
        // 'class' => 'yii\console\controllers\MigrateController',
        //'class' => 'panix\engine\console\controllers\MigrateController',
        // 'migrationPath' => null,
        // 'migrationNamespaces' => [
        //  'console\migrations',
        // 'lo\plugins\migrations',
        // ],
        //]
    ],
    'components' => [
        //'authManager' => [
        //    'class' => 'yii\rbac\DbManager',
        //    'defaultRoles' => ['guest', 'user'],
        //],
        'sitemap' => [
            'class' => 'app\common\modules\sitemap\Sitemap',
            'models' => [
                // your models
                'panix\mod\shop\models\Product',
                // or configuration for creating a behavior
                /*[
                    'class' => 'panix\mod\shop\models\Product',
                    'behaviors' => [
                        'sitemap' => [
                            'class' => '\app\common\modules\sitemap\behaviors\SitemapBehavior',
                            'scope' => function ($model) {
                                $model->select(['seo_alias', 'date_create']);
                                $model->andWhere(['switch' => 1]);
                            },
                            'dataClosure' => function ($model) {
                                return [
                                    'loc' => \yii\helpers\Url::to($model->url, true),
                                    'lastmod' => strtotime($model->date_create),
                                    'changefreq' => \app\common\modules\sitemap\Sitemap::DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],*/
            ],
            'urls' => [
                // your additional urls
                [
                    'loc' => ['/news/default/index'],
                    //'changefreq' => \app\common\modules\sitemap\Sitemap::DAILY,
                    'priority' => 0.8,
                    'news' => [
                        'publication' => [
                            'name' => 'Example Blog',
                            'language' => 'en',
                        ],
                        'access' => 'Subscription',
                        'genres' => 'Blog, UserGenerated',
                        'publication_date' => 'YYYY-MM-DDThh:mm:ssTZD',
                        'title' => 'Example Title',
                        'keywords' => 'example, keywords, comma-separated',
                        'stock_tickers' => 'NASDAQ:A, NASDAQ:B',
                    ],
                    'images' => [
                        [
                            'loc' => 'http://example.com/image.jpg',
                            'caption' => 'This is an example of a caption of an image',
                            'geo_location' => 'City, State',
                            'title' => 'Example image',
                            'license' => 'http://example.com/license',
                        ],
                    ],
                ],
            ],
            'enableGzip' => true, // default is false
            'cacheExpire' => 1, // 1 second. Default is 24 hours,
            'sortByPriority' => true, // default is false
        ],
        'session' => [
            'class' => 'yii\web\Session'
        ],
        /* 'i18n' => [
             'translations' => [
                 'app*' => [
                     'class' => 'yii\i18n\PhpMessageSource',
                     'basePath' => '@vendor/panix/engine/messages',
                     'fileMap' => [
                         'app' => 'app.php',
                         'app/admin' => 'admin.php',
                         'app/month' => 'month.php',
                         'app/error' => 'error.php',
                         'app/geoip_country' => 'geoip_country.php',
                         'app/geoip_city' => 'geoip_city.php',
                     ],
                 ],
             ],
         ],*/
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'cache' => ['class' => 'yii\caching\FileCache'],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'logVars' => [],
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => 'panix\engine\WebRequest',
            // 'baseUrl' => '/admin',
            // 'csrfParam' => '_csrf-console',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            // 'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'db' => $db,
        /*'urlManager' => [
            'scriptUrl' => 'http://app.loc',
            'baseUrl' => '',
        ],*/
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        /*'urlManager'=>\yii\helpers\ArrayHelper::merge([
            'scriptUrl' => 'http://app.loc/',
            'baseUrl' => '',
            'hostInfo'=>'http://app.loc/',

        ],require(__DIR__ . '/urlManager.php'))*/
    ],
    'params' => $params,
];
