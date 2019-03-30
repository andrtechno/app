<?php

namespace app\modules\install\assets;

use yii\web\AssetBundle;

class InstallAsset extends AssetBundle {


    public function init() {

        $this->sourcePath = "@app/modules/install/assets";
        parent::init();
    }

   // public $jsOptions = array(
   //     'position' => \yii\web\View::POS_HEAD
   // );

    public $css = [
        'css/install.css',
        //'css/shop.css'
    ];

    public $depends = [
        'panix\engine\assets\CommonAsset',
    ];

}
