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
        'gii' => 'yii\gii\Module',
    ],
    'controllerMap' => [
        'sitemap' => [
            'class' => 'app\modules\sitemap\console\CreateController',
        ],
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'app\migrations',
            //    'panix\mod\discounts\migrations',
            ],
            'templateFile' => '@vendor/panix/engine/views/migration.php',
            /* 'generatorTemplateFiles' => [
              'create_table' => '@vendor/panix/engine/views/createTableMigration.php',
              'drop_table' => '@vendor/panix/engine/views/dropTableMigration.php',
              'add_column' => '@vendor/panix/engine/views/addColumnMigration.php',
              'drop_column' => '@vendor/panix/engine/views/dropColumnMigration.php',
              'create_junction' => '@vendor/panix/engine/views/createTableMigration.php'
              ], */
            'useTablePrefix' => true,
        ]
    ],
    'components' => [

        'robotsTxt' => [
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
        ],
        'sitemap' => [
            'class' => 'app\modules\sitemap\Sitemap',
            'models' => [
                // your models
                'panix\mod\shop\models\Product',
                // or configuration for creating a behavior
                [
                    'class' => 'panix\mod\shop\models\Product',
                    'behaviors' => [
                        'sitemap' => [
                            'class' => '\app\modules\sitemap\behaviors\SitemapBehavior',
                            'scope' => function ($model) {
                                /** @var \yii\db\ActiveQuery $model */
                                $model->select(['seo_alias', 'date_create']);
                                $model->andWhere(['switch' => 1]);
                            },
                            'dataClosure' => function ($model) {
                                /** @var self $model */
                                return [
                                    'loc' => Url::to($model->url, true),
                                    'lastmod' => strtotime($model->date_create),
                                    'changefreq' => \app\modules\sitemap\Sitemap::DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],
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
        'session' => [
            'class' => 'yii\web\Session'
        ],
        'user' => ['class' => 'panix\mod\user\components\User'],
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
    ],
    'params' => $params,
];
