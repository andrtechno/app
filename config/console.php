<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
Yii::setAlias('@webroot', dirname(__DIR__).'/web');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db_local.php');

return [
    'id' => 'console',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'language' => 'ru',
    'modules' => [
        'gii' => ['class' => 'yii\gii\Module'],
        'shop' => ['class' => 'panix\mod\shop\Module'],
        'images' => ['class' => 'panix\mod\images\Module'],
        'cart' => ['class' => 'panix\mod\cart\Module'],
        'pages' => ['class' => 'panix\mod\pages\Module'],
        'exchange1c' => ['class' => 'panix\mod\exchange1c\Module'],
        'user' => ['class' => 'panix\mod\user\Module'],
        'wishlist' => ['class' => 'panix\mod\wishlist\Module'],
        'admin' => ['class' => 'panix\mod\admin\Module'],
    ],
    'controllerMap' => [
        'sitemap' => [
            'class' => 'app\modules\sitemap\console\CreateController',
        ],
        'migrate' => [
            'class' => 'panix\engine\console\controllers\MigrateController',
           // 'migrationPath' => null,
            //'migrationNamespaces' => [
               // 'app\migrations',
               // 'lo\plugins\migrations',
           // ],
        ]
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest', 'user'],
        ],
        /*'robotsTxt' => [
            'class' => 'app\modules\sitemap\RobotsTxt',
            'userAgent' => [
                // Disallow url for all bots
                '*' => [
                    'Disallow' => [
                        ['/api/default/index'],
                    ],
                    'Allow' => [
                        ['/api/doc/index'],
                    ],
                ],
                // Block a specific image from Google Images
                'Googlebot-Image' => [
                    'Disallow' => [
                        // All images on your site from Google Images
                        '/',
                        // Files of a specific file type (for example, .gif)
                        '/*.gif$',
                    ],
                ],
            ],
        ],*/
        'sitemap' => [
            'class' => 'app\modules\sitemap\Sitemap',
            'models' => [
                // your models
                'panix\mod\shop\models\Product',
                // or configuration for creating a behavior
                /*[
                    'class' => 'panix\mod\shop\models\Product',
                    'behaviors' => [
                        'sitemap' => [
                            'class' => '\app\modules\sitemap\behaviors\SitemapBehavior',
                            'scope' => function ($model) {
                                $model->select(['seo_alias', 'date_create']);
                                $model->andWhere(['switch' => 1]);
                            },
                            'dataClosure' => function ($model) {
                                return [
                                    'loc' => \yii\helpers\Url::to($model->url, true),
                                    'lastmod' => strtotime($model->date_create),
                                    'changefreq' => \app\modules\sitemap\Sitemap::DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],*/
            ],
            'urls'=> [
                // your additional urls
                [
                    'loc' => ['/news/default/index'],
                    //'changefreq' => \app\modules\sitemap\Sitemap::DAILY,
                    'priority' => 0.8,
                    'news' => [
                        'publication'   => [
                            'name'          => 'Example Blog',
                            'language'      => 'en',
                        ],
                        'access'            => 'Subscription',
                        'genres'            => 'Blog, UserGenerated',
                        'publication_date'  => 'YYYY-MM-DDThh:mm:ssTZD',
                        'title'             => 'Example Title',
                        'keywords'          => 'example, keywords, comma-separated',
                        'stock_tickers'     => 'NASDAQ:A, NASDAQ:B',
                    ],
                    'images' => [
                        [
                            'loc'           => 'http://example.com/image.jpg',
                            'caption'       => 'This is an example of a caption of an image',
                            'geo_location'  => 'City, State',
                            'title'         => 'Example image',
                            'license'       => 'http://example.com/license',
                        ],
                    ],
                ],
            ],
            'enableGzip' => true, // default is false
            'cacheExpire' => 1, // 1 second. Default is 24 hours,
            'sortByPriority' => true, // default is false
        ],
       // 'session' => [
        //    'class' => 'yii\web\Session'
        //],
       // 'user' => ['class' => 'panix\mod\user\components\User'],

        'user' => [
            'class' => 'panix\mod\user\components\User',
            'identityClass' => 'panix\mod\user\models\User',
            //'enableAutoLogin' => true,
        ],
        'session' => [ // for use session in console application
            'class' => 'yii\web\Session'
        ],

        'settings' => ['class' => 'panix\engine\components\Settings'],
        'cache' => ['class' => 'yii\caching\FileCache'],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*'urlManager' => [
            'scriptUrl' => 'http://app.loc',
            'baseUrl' => '',
        ],*/
        /*'i18n' => [
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
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'urlManager'=>\yii\helpers\ArrayHelper::merge([
            'scriptUrl' => 'http://app.loc/',
            'baseUrl' => '',
            'hostInfo'=>'http://app.loc/',

        ],require(__DIR__ . '/urlManager.php'))
    ],
    'params' => $params,
];
