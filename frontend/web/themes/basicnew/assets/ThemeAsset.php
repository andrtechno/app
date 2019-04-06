<?php

namespace app\frontend\web\themes\basicnew\assets;

use panix\engine\web\AssetBundle;

class ThemeAsset extends AssetBundle {

    private $_theme;

    public function init() {
        $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = "@frontend/themes/{$this->_theme}/assets";
        parent::init();
    }

    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto+Slab:400,700&amp;subset=cyrillic',
        'css/app.css',
        'css/style.css',
    ];

    public $depends = [
        'panix\engine\assets\JqueryCookieAsset',
        'panix\engine\assets\CommonAsset',
        'panix\mod\shop\assets\WebAsset',
        'panix\mod\comments\assets\WebAsset',
        'panix\mod\cart\assets\CartAsset',
        'panix\mod\wishlist\assets\WishlistAsset',
    ];

}
