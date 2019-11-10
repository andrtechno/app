<?php

namespace app\web\themes\dashboard;

use panix\engine\web\AssetBundle;

/**
 * Class AdminCountersAsset
 * @package app\web\themes\dashboard
 */
class AdminCountersAsset extends AssetBundle
{


    public function init()
    {
        $this->sourcePath = \Yii::$app->view->theme->basePath . '/assets';
        parent::init();
    }

    public $js = [
        'js/jquery.playSound.js',
        'js/counters.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'panix\engine\assets\CommonAsset'
    ];

}
