<?php

use panix\engine\WebApplication;

error_reporting(E_ALL);
//Timezone
date_default_timezone_set("UTC");


//print_r($_SERVER);

// comment out the following two lines when deployed to production
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $env = 'dev';
    $debug = true;
} else {
    $env = 'prod';
    $debug = false;

}
defined('YII_DEBUG') or define('YII_DEBUG', $debug);
defined('YII_ENV') or define('YII_ENV', $env);

require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../vendor/autoload.php');
$config = require(__DIR__ . '/config/backend.php');
//use yii\web\Application;


$app = new WebApplication($config);
//Yii::setAlias('@bower', dirname(__DIR__) . '/vendor/bower-asset');
$app->run();
