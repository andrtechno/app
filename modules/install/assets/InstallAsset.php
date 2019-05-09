<?php

namespace app\modules\install\assets;

use yii\web\AssetBundle;

class InstallAsset extends AssetBundle {


    public function init() {

        $this->sourcePath = __DIR__;
        parent::init();
    }

   // public $jsOptions = array(
   //     'position' => \yii\web\View::POS_HEAD
   // );

    public $css = [
        'css/install.css',
    ];

    public $depends = [
        'yii\bootstrap4\BootstrapPluginAsset',
        'panix\engine\assets\IconAsset',
    ];

}
