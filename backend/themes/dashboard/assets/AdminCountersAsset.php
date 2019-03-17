<?php

namespace app\backend\themes\dashboard\assets;

use yii\web\AssetBundle;

class AdminCountersAsset extends AssetBundle
{


    public function init()
    {
        $this->sourcePath = \Yii::$app->view->theme->basePath . '/assets';
        parent::init();
    }

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

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
