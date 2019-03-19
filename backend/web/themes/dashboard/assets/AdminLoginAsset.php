<?php

namespace app\backend\web\themes\dashboard\assets;

use yii\web\AssetBundle;

class AdminLoginAsset extends AssetBundle {


    public function init()
    {
        $this->sourcePath = \Yii::$app->view->theme->basePath . '/assets';
        parent::init();
    }
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $css = [
        'css/dashboard.css',
        'css/login.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'panix\engine\assets\CommonAsset'
    ];

}
