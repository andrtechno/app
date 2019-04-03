<?php
use panix\engine\pdf\Pdf;
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend/web');
Yii::setAlias('@backend', dirname(__DIR__) . '/web');
$db = YII_DEBUG ? dirname(__DIR__) . '/../common/config/db_local.php' : dirname(__DIR__) . '/../common/config/db.php';
$config = [
    'id' => 'backend',
    'homeUrl' => '/admin',
    'name' => 'PIXELION CMS',
    'basePath' => dirname(__DIR__) . '/../',
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    //'sourceLanguage'=>'ru',
    'runtimePath' => '@app/backend/runtime',
    'controllerNamespace' => 'panix\engine\controllers',
    //'defaultRoute' => 'main/main',
    'bootstrap' => [
        'log',
        'maintenanceMode',
        'panix\engine\BootstrapModule'
    ],
    'controllerMap' => [
        'main' => 'panix\engine\controllers\WebController',
        'backend' => 'panix\engine\controllers\AdminController',
    ],
    'modules' => [
        'sitemap' => [
            'class' => 'app\modules\sitemap\Module',
        ],
        'plugins' => [
            'class' => 'panix\mod\plugins\Module',
            'pluginsDir' => [
                // '@plugins/core',
                '@panix/engine/plugins',
            ]
        ],
        'rbac' => [
            'class' => 'panix\mod\rbac\Module',
            'as access' => [
                'class' => panix\mod\rbac\filters\AccessControl::class
            ],
        ],
        'admin' => ['class' => 'panix\mod\admin\Module'],
        'user' => ['class' => 'panix\mod\user\Module'],
        //'stats' => ['class' => 'panix\mod\stats\Module'],
        //'hosting' => ['class' => 'app\modules\hosting\Module'],
        /* 'seo' => ['class' => 'app\modules\seo\Module'],
          'pages' => ['class' => 'panix\mod\pages\Module'],
          'shop' => ['class' => 'panix\mod\shop\Module'],
          'contacts' => ['class' => 'panix\mod\contacts\Module'],
          // 'cart' => ['class' => 'panix\mod\cart\Module'],
          'discounts' => ['class' => 'panix\mod\discounts\Module'],
          'sitemap' => ['class' => 'panix\mod\sitemap\Module'],
          'comments' => ['class' => 'panix\mod\comments\Module'],
          'wishlist' => ['class' => 'panix\mod\wishlist\Module'],
          'exchange1c' => ['class' => 'panix\mod\exchange1c\Module'],
          'csv' => ['class' => 'panix\mod\csv\Module'],
          'blocks' => ['class' => 'profitcode\blocks\Module'],
          //'csv' => ['class' => 'panix\mod\csv\Module'],
          'yandexmarket' => ['class' => 'panix\mod\yandexmarket\Module'],
          'delivery' => ['class' => 'panix\mod\delivery\Module'],
          'forum' => ['class' => 'panix\mod\forum\Module'],
          // 'portfolio' => ['class' => 'app\modules\portfolio\Module'],
          'images' => [
          'class' => 'panix\mod\images\Module',
          'imagesStorePath' => 'uploads/store', //path to origin images
          'imagesCachePath' => 'uploads/cache', //path to resized copies
          'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
          'placeHolderPath' => '@webroot/uploads/watermark.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
          'imageCompressionQuality' => 100, // Optional. Default value is 85.
          'waterMark' => '@webroot/uploads/watermark.png'
          ], */
    ],
    'components' => [
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'panix\engine\widgets\recaptcha\ReCaptcha',
            'siteKey' => '6LfJqpYUAAAAAMKYmNUctjXeTkQrx74R2LHaM0r7',
            'secret' => '6LfJqpYUAAAAAGOItZcYABLTjDilBvgaAJE7vJL0',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest', 'user'],
        ],
        'img' => [
            'class' => 'panix\engine\components\ImageHandler',
        ],
        'fcm' => [
            'class' => 'understeam\fcm\Client',
            'apiKey' => 'AIzaSyAbeTCpxK7OGu_lXZDSnJjV1ItkUwPOBbc', // Server API Key (you can get it here: https://firebase.google.com/docs/server/setup#prerequisites)
        ],
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
                'app\modules\news\models\News',
                // or configuration for creating a behavior
                [
                    'class' => 'app\modules\news\models\News',
                    'behaviors' => [
                        'sitemap' => [
                            'class' => '\app\modules\sitemap\behaviors\SitemapBehavior',
                            'scope' => function ($model) {
                                /** @var \yii\db\ActiveQuery $model */
                                $model->select(['url', 'lastmod']);
                                $model->andWhere(['is_deleted' => 0]);
                            },
                            'dataClosure' => function ($model) {
                                /** @var self $model */
                                return [
                                    'loc' => \yii\helpers\Url::to($model->url, true),
                                    'lastmod' => strtotime($model->lastmod),
                                    'changefreq' => \app\modules\sitemap\Sitemap::DAILY,
                                    'priority' => 0.8
                                ];
                            }
                        ],
                    ],
                ],
            ],
            'urls' => [
                // your additional urls
                [
                    'loc' => ['/news/default/index'],
                    //'changefreq' => \app\modules\sitemap\Sitemap::DAILY,
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
        'curl' => ['class' => 'panix\engine\Curl'],
        'consoleRunner' => [
            'class' => 'panix\engine\components\ConsoleRunner',
            'file' => '@my/path/to/yii' // or an absolute path to console file
        ],
        'seo' => ['class' => 'app\modules\seo\components\SeoExt'],
        'geoip' => ['class' => 'panix\engine\components\geoip\GeoIP'],
        'pdf' => [
            'class' => Pdf::class,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'mode' => Pdf::MODE_UTF8,
        ],
        'formatter' => [
            'class' => 'panix\engine\i18n\Formatter'
        ],
        'maintenanceMode' => [
            'class' => 'panix\engine\maintenance\MaintenanceMode',
            // Allowed roles
            //'roles' => [
            //    'admin',
            //],
            //Retry-After header
            // 'retryAfter' => 120 //or Wed, 21 Oct 2015 07:28:00 GMT for example
        ],
        'assetManager' => [
            'forceCopy' => YII_DEBUG,
            // 'basePath'=>'@webroot/web/assets',
            'bundles' => [
                //'yii\jui\JuiAsset' => ['css' => []],
                'yii\jui\JuiAsset' => [
                    //'js' => [
                    //'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'
                    //]
                ],
                'panix\lib\google\maps\MapAsset' => [
                    'options' => [
                        'key' => 'AIzaSyB5BYRPxlqTN9GwnZHQbmW-eJxT7ZxyAfM',
                        'language' => 'ru',
                        'version' => '3.39'
                    ]
                ]
            ],
            //'linkAssets' => true,
            'appendTimestamp' => true
        ],
        'view' => [
            // 'class' => 'panix\engine\View',
            'class' => panix\mod\plugins\components\View::class,
            'as Layout' => [
                'class' => \panix\engine\behaviors\LayoutBehavior::class,
            ],
            'renderers' => [
                'tpl' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    'cachePath' => '@runtime/Smarty/cache',
                ],
            ],
            'theme' => [
                'class' => 'panix\engine\base\Theme',
                'name' => 'dashboard'
            ],
        ],
        'plugins' => [
            'class' => panix\mod\plugins\components\PluginsManager::class,
            'appId' => panix\mod\plugins\BasePlugin::APP_BACKEND,
            // by default
            'enablePlugins' => true,
            'shortcodesParse' => true,
            'shortcodesIgnoreBlocks' => [
                '<pre[^>]*>' => '<\/pre>',
                // '<div class="content[^>]*>' => '<\/div>',
            ]
        ],
        'i18n' => [
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
        ],
        'session' => [
            'class' => '\panix\engine\web\DbSession',
            //'class' => '\yii\web\DbSession',
            //'writeCallback'=>['panix\engine\web\DbSession', 'writeFields']
        ],
        'request' => [
            'class' => 'panix\engine\WebRequest',
            'baseUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fpsiKaSs1Mcb6zwlsUZwuhqScBs5UgPQ',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache', //DummyCache
        ],
        'user' => [
            'class' => 'panix\mod\user\components\WebUser',
            'enableAutoLogin' => true,
            // 'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'errorHandler' => [
            //'class'=>'panix\engine\base\ErrorHandler'
            'errorAction' => 'backend/error',
            // 'errorView' => '@webroot/themes/basic/views/layouts/error.php'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'useFileTransport' => true,
            //'layoutsPath' => '@web/mail/layouts',
            //'viewsPath' => '@web/mail/views',
            'messageConfig' => [
                //    'from' => ['dev@corner-cms.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/db.log',
                    'categories' => ['yii\db\*']
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['warning'],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/warning.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/info.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['profile'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/profile.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['trace'],
                    'logVars' => [],
                    'logFile' => '@runtime/logs/' . date('Y-m-d') . '/trace.log',
                ],
                [
                    'class' => 'panix\engine\log\EmailTarget',
                    'levels' => ['error', 'warning'],
                    'enabled' => false,//YII_DEBUG,
                    'categories' => ['yii\base\*'],
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:403',
                        'yii\web\HttpException:400',
                        'yii\i18n\PhpMessageSource::loadMessages'
                    ],
                    /*'message' => [
                        'from' => ['log@pixelion.com.ua'],
                        'to' => ['dev@pixelion.com.ua'],
                        'subject' => 'Ошибки базы данных на сайте app',
                    ],*/
                ],
                /*[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'logTable' => '{{%log_error}}',
                    'except' => [
                        'yii\web\HttpException:404',
                        'yii\web\HttpException:403',
                        'yii\web\HttpException:400',
                        'yii\i18n\PhpMessageSource::loadMessages'
                    ],
                ],*/
            ],
        ],
        'languageManager' => ['class' => 'panix\engine\ManagerLanguage'],
        'settings' => ['class' => 'panix\engine\components\Settings'],
        'urlManager' => [
            'class' => 'panix\engine\ManagerUrl',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'baseUrl' => '',
            //'normalizer' => [
            //    'class' => 'yii\web\UrlNormalizer',
            //    'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
            //],
            'rules' => [
                'placeholder' => 'main/placeholder',
                ['pattern' => '', 'route' => 'admin/admin/default/index'],
                ['pattern' => 'auth', 'route' => 'admin/auth/index'],
                ['pattern' => 'app/<controller:\w+>', 'route' => 'admin/admin/<controller>/index'],
                ['pattern' => 'app/<controller:\w+>/<action:[0-9a-zA-Z_\-]+>', 'route' => 'admin/admin/<controller>/<action>'],
                ['pattern' => '<module:\w+>', 'route' => '<module>/admin/default/index'],
                ['pattern' => '<module:\w+>/<controller:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/index'],
                ['pattern' => '<module:\w+>/<controller:[0-9a-zA-Z_\-]+>/<action:[0-9a-zA-Z_\-]+>', 'route' => '<module>/admin/<controller>/<action>'],
            ],
        ],
        'db' => require($db),
    ],
    /*'as access' => [
        'class' => panix\mod\rbac\filters\AccessControl::class,
        'allowActions' => [
           // '/*',
            'admin/*',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],*/
    'params' => require(dirname(__DIR__) . '/../common/config/params.php'),
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
   // $config['modules']['debug']['class'] = 'yii\debug\Module';
    // $config['modules']['debug']['traceLine'] = '<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>';
   /* $config['modules']['debug']['traceLine'] = function ($options, $panel) {
        $filePath = $options['file'];
        // $filePath = str_replace(Yii::$app->basePath, 'file://~/path/to/your/backend', $filePath);
        // $filePath = str_replace(dirname(Yii::$app->basePath) . '/common', 'file://~/path/to/your/common', $filePath);
        /// $filePath = str_replace(Yii::$app->vendorPath, 'file://~/path/to/your/vendor', $filePath);
        return strtr('<a href="phpstorm://open?url={file}&line={line}">{file}:{line}</a>', ['{file}' => $filePath]);
    };*/
    //$config['bootstrap'][] = 'gii';
    //$config['modules']['gii'] = 'yii\gii\Module';
}
return $config;