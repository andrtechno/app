<?php

namespace app\web\themes\basic\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {

    private $_theme;

    public function init() {
        $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = "@webroot/themes/{$this->_theme}/assets";
        parent::init();
    }

   // public $jsOptions = array(
   //     'position' => \yii\web\View::POS_HEAD
   // );

    public $css = [
        'css/style.css',
        //'css/shop.css'
    ];

    public $depends = [
        'panix\engine\assets\CommonAsset',
        'panix\mod\shop\assets\WebAsset',
        'panix\mod\comments\assets\WebAsset',
    ];

}