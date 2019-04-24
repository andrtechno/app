<?php

error_reporting(E_ALL);
//Timezone
date_default_timezone_set("UTC");

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../vendor/autoload.php');
$config = require(__DIR__ . '/config/install.php');
//use panix\engine\Application; //
use yii\web\Application;
$app = new Application($config);
Yii::setAlias('@bower', dirname(__DIR__) . '/vendor/bower-asset');
$app->run();
