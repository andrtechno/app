<?php

namespace app\web\themes\basicnew;

use panix\engine\web\AssetBundle;

class ThemeAsset extends AssetBundle {

    private $_theme;

    public function init() {
        $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = __DIR__."/assets";
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
        'panix\mod\shop\bundles\WebAsset',
        'panix\mod\comments\WebAsset',
        'panix\mod\cart\CartAsset',
        'panix\mod\wishlist\WishlistAsset',
        'panix\mod\sendpulse\SendpulseAsset'
    ];

}