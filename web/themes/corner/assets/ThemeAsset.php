<?php

namespace app\web\themes\corner\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle {

    private $_theme;

    public function init() {
        $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = "@app/web/themes/{$this->_theme}/assets";
        parent::init();
    }

   // public $jsOptions = array(
   //     'position' => \yii\web\View::POS_HEAD
   // );

    public $css = [
        'css/style.css',
    ];

    public $depends = [
        'panix\engine\assets\CommonAsset',
        'panix\mod\cart\assets\CartAsset',
    ];

}
