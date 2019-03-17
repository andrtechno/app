<?php

namespace app\backend\themes\dashboard\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle {

   // public $sourcePath = '@backend/themes/dashboard/assets';

    public function init()
    {
        $this->sourcePath = \Yii::$app->view->theme->basePath . '/assets';
        parent::init();
    }

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
        'css/dashboard.css',
        'css/breadcrumbs.css',
        'css/dark.css',
       // 'css/ui.css',
    ];
    public $js = [

    ];
    public $depends = [
        'panix\engine\assets\CommonAsset',
        'panix\engine\assets\ClipboardAsset',
        'app\backend\themes\dashboard\assets\AdminCountersAsset',
    ];

}
